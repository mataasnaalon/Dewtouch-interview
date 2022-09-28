<?php
	class OrderReportController extends AppController{

		public function index(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));
			// debug($orders);exit;
			//debug($orders);

			$this->loadModel('Portion');
			$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));
			// debug($portions);exit;
			//debug($portions);


			// To Do - write your own array in this format
			/*$order_reports = array('Order 1' => array(
										'Ingredient A' => 1,
										'Ingredient B' => 12,
										'Ingredient C' => 3,
										'Ingredient G' => 5,
										'Ingredient H' => 24,
										'Ingredient J' => 22,
										'Ingredient F' => 9,
									),
								  'Order 2' => array(
								  		'Ingredient A' => 13,
								  		'Ingredient B' => 2,
								  		'Ingredient G' => 14,
								  		'Ingredient I' => 2,
								  		'Ingredient D' => 6,
								  	),
								);*/

			// ...

			$order_reports = array();

			if($orders){

				foreach($orders as $key => $order){


					$order_reports[$order['Order']['name']] = array();

					$quantities = 0;

					$OrderDetail = $order['OrderDetail'];

					if($OrderDetail){
						foreach($OrderDetail as $detail){
							$order_detail_item = $detail['Item']['name'];

							if($portions){
								foreach($portions as $key2 => $portion){

									$item = $portion['Item'];

									if($item['name'] == $order_detail_item){

										$PortionDetail = $portion['PortionDetail'];

										if($PortionDetail){

											foreach($PortionDetail as $portion_detail){

												$part = $portion_detail['Part']['name'];

												$value = (int)$portion_detail['value'];

												$quantities = $quantities + $value;

												$order_reports[$order['Order']['name']][$part] = $quantities;
											}
										}
									}
								}
							}
						}
					}
				}
			}

			//debug($order_reports);

			$this->set('order_reports',$order_reports);

			$this->set('title',__('Orders Report'));
		}

		public function Question(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));

			// debug($orders);exit;

			$this->set('orders',$orders);

			$this->loadModel('Portion');
			$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));
				
			// debug($portions);exit;

			$this->set('portions',$portions);

			$this->set('title',__('Question - Orders Report'));
		}

	}