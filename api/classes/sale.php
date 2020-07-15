<?php
    require_once 'notification.php';
    require_once 'stock.php';

	class Sale {

        // create sale
        // public static function create_sale($product_id, $patient_id, $quantity, $price_per_unit, $total_sale, $added_by, $conn){
        // 	$invoice_id     = self::get_sale_invoice($conn);
        //     $price_per_unit = self::extract_numeric_value($price_per_unit);
        //     $total_sale     = self::extract_numeric_value($total_sale);

        //     try{
        //         $query = $conn->prepare('INSERT INTO sales(invoice_id, product_id, patient_id, quantity, price_per_unit, total_sale, added_by) VALUES(:invoice_id, :product_id, :patient_id, :quantity, :price_per_unit, :total_sale, :added_by)');
        //         $query->execute([':invoice_id' => $invoice_id, ':product_id' => $product_id, ':patient_id' => $patient_id, ':quantity' => $quantity, ':price_per_unit' => $price_per_unit, ':total_sale' => $total_sale, ':added_by' => $added_by]);

        //         self::update_product_quantity($product_id, $quantity, '-', $conn);
        //         return true;
        //     }catch(PDOException $ex){
        //     	return false;
        //     }
        // }

        // create sale
        public static function create_sale($product_id, $quantity, $price_per_unit, $total_sale, $amount_paid, $added_by, $conn){
            $invoice_id     = self::get_sale_invoice($conn);
            $price_per_unit = self::extract_numeric_value($price_per_unit);
            $total_sale     = self::extract_numeric_value($total_sale);
            $balance        = $amount_paid - $total_sale;

            try{
                $query = $conn->prepare('INSERT INTO sales(invoice_id, product_id, quantity, price_per_unit, total_sale_paid, balance, added_by) VALUES(:invoice_id, :product_id, :quantity, :price_per_unit, :total_sale_paid, :balance, :added_by)');
                $query->execute([':invoice_id' => $invoice_id, ':product_id' => $product_id, ':quantity' => $quantity, ':price_per_unit' => $price_per_unit, ':total_sale' => $total_sale, ':amount_paid' => $amount_paid, ':balance' => $balance, ':added_by' => $added_by]);

                self::update_product_quantity($product_id, $quantity, '-', $conn);
                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // fetch all sales
        // public static function read_sales($conn){
        //     try{
        //         $query = $conn->prepare('SELECT s.id, s.invoice_id, s.product_id, s.patient_id, s.quantity, s.price_per_unit, s.total_sale, s.date_added, s.added_by, s.status, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name, p.first_name as pfirst_name, p.middle_name as pmiddle_name, p.last_name as plast_name, st.product as product FROM sales s INNER JOIN users u ON s.added_by = u.staff_id INNER JOIN patients p ON s.patient_id = p.patient_id INNER JOIN stock st ON s.product_id = st.product_id ORDER BY s.status DESC, s.id DESC');
        //         $query->execute();

        //         return $query->fetchAll(PDO::FETCH_OBJ);
        //     }catch(PDOException $ex){}
        // }

        // fetch all sales
        public static function read_sales($conn){
            try{
                $query = $conn->prepare('SELECT s.id, s.invoice_id, s.product_id, s.quantity, s.price_per_unit, s.total_sale, s.amount_paid, s.balance, s.date_added, s.added_by, s.status, u.first_name as ufirst_name, u.other_name as uother_name, u.last_name as ulast_name, st.product as product FROM sales s INNER JOIN users u ON s.added_by = u.staff_id INNER JOIN stock st ON s.product_id = st.product_id ORDER BY s.status DESC, s.id DESC');
                $query->execute();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        // fetch a product
        public static function read_sale($invoice_id, $conn){
            try{
                $query = $conn->prepare('SELECT * FROM sales WHERE invoice_id = :invoice_id');
                $query->execute([':invoice_id' => $invoice_id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        public static function is_product_id_entered($product_id, $conn){
            try{
                $query = $conn->prepare('SELECT * FROM sales WHERE product_id = :product_id');
                $query->execute([':product_id' => $product_id]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        public static function send_out_of_stock_notification($product_id, $conn){
            try{
                if(self::is_product_available($product_id, $conn) < 1) {
                    $product = Stock::read_product_name($product_id, $conn);
                    Notification::create_notification('Product Out Of Stock', 'Product "'.$product.'" Has Run Out Completely. Please Re-stock', $conn);
                } else if(self::is_product_available($product_id, $conn) < 100) {
                    $product = Stock::read_product_name($product_id, $conn);
                    Notification::create_notification('Low Stock Reminder', 'Product "'.$product.'" Has Less Than 100 Items Remaining In Stock', $conn);
                }
            }catch(PDOException $ex){}
        }

        public static function is_product_available($product_id, $conn) {
            try{
                $query = $conn->prepare('SELECT quantity FROM stock WHERE product_id = :product_id');
                $query->execute([':product_id' => $product_id]);

                return $query->fetch(PDO::FETCH_OBJ)->quantity;
            }catch(PDOException $ex){}
        }

        public static function is_quantity_greater_than_stock($product_id, $quantity, $conn) {
            try{
                $query = $conn->prepare('SELECT * FROM stock WHERE product_id = :product_id AND quantity >= :quantity');
                $query->execute([':product_id' => $product_id, ':quantity' => $quantity]);

                return $query->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $ex){}
        }

        public static function update_product_quantity($product_id, $qty, $operand, $conn){
            try{
                if($operand === '-') {
                    $query = $conn->prepare('UPDATE stock SET quantity = (quantity - :qty) WHERE product_id = :product_id');
                } else {
                    $query = $conn->prepare('UPDATE stock SET quantity = (quantity + :qty) WHERE product_id = :product_id');
                }

                $query->execute([':qty' => $qty, ':product_id' => $product_id]);
                self::send_out_of_stock_notification($product_id, $conn);
            }catch(PDOException $ex){}
        }

        // public static function parse_update_sale_data($id, $invoice_id, $product_id, $old_product_id, $patient_id, $quantity, $old_quantity, $price_per_unit, $total_sale, $conn) {
        //     $difference = 0;
                
        //     if($product_id === $old_product_id) {
        //         if($old_quantity > $quantity) {
        //             $difference = $old_quantity - $quantity;
        //             self::update_product_quantity($product_id, $difference, '+', $conn);
        //         } else if($old_quantity < $quantity) {
        //             $difference = $quantity - $old_quantity;
        //             self::update_product_quantity($product_id, $difference, '-', $conn);
        //         }
        //     } else {
        //         self::update_product_quantity($old_product_id, $quantity, '+', $conn);
        //         self::update_product_quantity($product_id, $quantity, '-', $conn);
        //     }
        //     return self::update_sale($id, $invoice_id, $product_id, $patient_id, $quantity, $price_per_unit, $total_sale, $conn);
        // }

        public static function parse_update_sale_data($id, $invoice_id, $product_id, $old_product_id, $quantity, $old_quantity, $price_per_unit, $total_sale, $amount_paid, $conn) {
            $difference = 0;
                
            if($product_id === $old_product_id) {
                if($old_quantity > $quantity) {
                    $difference = $old_quantity - $quantity;
                    self::update_product_quantity($product_id, $difference, '+', $conn);
                } else if($old_quantity < $quantity) {
                    $difference = $quantity - $old_quantity;
                    self::update_product_quantity($product_id, $difference, '-', $conn);
                }
            } else {
                self::update_product_quantity($old_product_id, $quantity, '+', $conn);
                self::update_product_quantity($product_id, $quantity, '-', $conn);
            }
            return self::update_sale($id, $invoice_id, $product_id, $quantity, $price_per_unit, $total_sale, $amount_paid, $conn);
        }

        // update a product_id record
        // public static function update_sale($id, $invoice_id, $product_id, $patient_id, $quantity, $price_per_unit, $total_sale, $conn) {
        //     try{
        //         $query = $conn->prepare('UPDATE sales SET product_id = :product_id, patient_id = :patient_id, quantity = :quantity, price_per_unit = :price_per_unit, total_sale = :total_sale WHERE id = :id AND invoice_id = :invoice_id');
        //         $query->execute([':product_id' => $product_id, ':patient_id' => $patient_id, ':quantity' => $quantity, ':price_per_unit' => $price_per_unit, ':total_sale' => $total_sale, ':id' => $id, ':invoice_id' => $invoice_id]);

        //         return true;
        //     }catch(PDOException $ex){
        //         return false;
        //     }
        // }

        // update a product_id record
        public static function update_sale($id, $invoice_id, $product_id, $quantity, $price_per_unit, $total_sale, $amount_paid, $conn) {
            $balance = $amount_paid - $total_sale;

            try{
                $query = $conn->prepare('UPDATE sales SET product_id = :product_id, quantity = :quantity, price_per_unit = :price_per_unit, total_sale = :total_sale_paid = :amount_paid, balance = :balance WHERE id = :id AND invoice_id = :invoice_id');
                $query->execute([':product_id' => $product_id, ':quantity' => $quantity, ':price_per_unit' => $price_per_unit, ':total_sale' => $total_sale, ':amount_paid' => $amount_paid, ':balance' => $balance, ':id' => $id, ':invoice_id' => $invoice_id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // pay purchase
        public static function pay_sale($id, $conn) {
            try{
                $query = $conn->prepare('UPDATE sales SET status = :status WHERE id = :id');
                $query->execute([':status' => 'Settled', ':id' => $id]);

                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        // generate a unique invoice id
        public static function get_sale_invoice($conn) {
            $total = 0;
            $rand  = rand(0, 99);
            $rand  = ($rand < 10) ? '0' . $rand : $rand;

            try {
                $query  = $conn->prepare("SELECT COUNT(*) as total FROM sales");
                $query->execute();
                $result = $query->fetch(PDO::FETCH_OBJ);
                $total  = $total + $result->total;

                return 'INV-SALE-' . $rand . $total;
            } catch(PDOException $ex){}
        }

        public static function extract_numeric_value($value) {
            return substr($value, 3);
        }

	}

?>