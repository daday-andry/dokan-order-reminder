<?php
if ( ! class_exists( 'WP_CLI' ) ) {
    return;
}

class DOR_Command extends WP_CLI_Command {
    
    public function vendor_order_reminder($args, $assoc_args ) {
        
        $reminder_period  = dokan_get_option( 'vendor_reminder_after_period',  'dokan_order_reminder', 24);
        $reminder_subject = dokan_get_option( 'vendor_reminder_email_subject', 'dokan_order_reminder', 'Notification: Order pending');
        $reminder_message = dokan_get_option( 'vendor_reminder_message',       'dokan_order_reminder', '');
        
        $pending_orders = $this->get_pending_orders_since(
            (time() - $reminder_period * HOUR_IN_SECONDS)
        );

        $mailer = WC()->mailer();
        $email = new WC_Email();


        foreach ($pending_orders as $vendor_email => $data){
            $message = str_replace(['[order_count]', '[vendor_name]'], [count($data['orders']), $data['vendor_name']], $reminder_message); 
            $message = apply_filters('woocommerce_mail_content', 
                $email->style_inline( $mailer->wrap_message( $reminder_subject, $message ) ) 
            );
            
            wp_mail($vendor_email, $reminder_subject, $message, 'Content-Type: text/html; charset=UTF-8' );
            
            foreach ($data['orders'] as $order){
                $order->update_meta_data('vendor_reminder_reminded_at',  time());
                $order->save();
            }
            
        }

        WP_CLI::success( 'Commande exécutée avec succès depuis mon plugin' );
    }

    private function get_pending_orders_since($time){
        $data =  wc_get_orders( [
            'limit'        => -1,
            'status'       => 'pending',
            'date_created' => '<' . $time,
            'meta_key'     => 'vendor_reminder_reminded_at',
            'meta_value'   => '',
            'meta_compare' => 'NOT EXISTS'    
        ]);

        return $this->group_order_by_seller($data);
    }

    private function group_order_by_seller($orders){
        $_array = [];
        foreach($orders as $order){
            foreach ($order->get_items() as $item ) {
                $product           = $item->get_product();
                $author_id         = $product->post->post_author;
                $vendor            = dokan()->vendor->get($author_id);
                $email             = $vendor->get_email();
                
                if($_array[$email] ?? false){
                    $_array[$email]['orders'][]  = $order;
                    continue;
                }

                $_array[$email] = [
                    "orders"       => [$order],
                    "vendor_name"  => $vendor->get_name()
                ];
            }
        }

        return $_array;
    }
}

WP_CLI::add_command( 'dor', 'DOR_Command' );