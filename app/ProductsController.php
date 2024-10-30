<?php 
	if (!isset($_SESSION)) {
        session_start();
    }



    if (isset($_POST['action'])) {
        switch($_POST['action']){
    
            case 'addProduct':
    
                $name = $_POST['name'];
                $slug = $_POST['slug'];
                $description = $_POST['description'];
                $features = $_POST['features'];
                $producController = new ProductsController();
                $producController->addProduct($name,$slug,$description,$features);
    
            break;
    
            // case 'update_product':
    
            //     $nombre = $_POST['nombre'];
            //     $slug = $_POST['slug'];
            //     $description = $_POST['description'];
            //     $features = $_POST['features'];
            //     $product_id = $_POST['product_id'];
            //     $producController = new ProductsController();
            //     $producController->update($nombre,$slug,$description,$features,$product_id);
    
            // break;
    
            case 'deleteProduct': 
    
                $idProduct = $_POST['idProduct'];
    
                $producController = new ProductsController();
                $producController->deleteProduct($idProduct);
    
            break;
        }
    }







class ProductsController 
{
	
	public function get()
	{
		$curl = curl_init();  

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: Bearer '.$_SESSION['user_data']->token
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);  
		$response = json_decode($response);
      //  echo  json_encode($response);


		if (isset($response->code) && $response->code > 0) {
			
			return $response->data;

		}else{
			return [];
		}

	}

	public function getBySlug($slug)
	{
		$curl = curl_init();  

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/'.$slug,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: Bearer '.$_SESSION['user_data']->token
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);  
		$response = json_decode($response);
    //    print_r($response);
		if (isset($response->code) && $response->code > 0) {
			
			return $response->data;

		}else{
			return [];
		}

	}


    public function addProduct($name,$slug,$description,$features){
       
        $curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => array(
		  	'name' => $name,
		  	'slug' => $slug,
		  	'description' => $description,
		  	'features' => $features
		  ),
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: Bearer '.$_SESSION['user_data']->token
		  ),
		));

		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);


		if (isset($response->code) && $response->code >0) {
			
			header('Location: ../home.php?status=ok');
		}else{
			header('Location: ../home.php?status=error');
            
		}

    }


    public function  deleteProduct($idProduct){
        $curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/'.$idProduct,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'DELETE',
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: Bearer '.$_SESSION['user_data']->token
		  ),
		)); 

		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);


		if (isset($response->code) && $response->code >0) {
			
			header('Location: ../home.php?status=ok');
		}else{
			header('Location: ../home.php?status=error');
		}
    
    }




}

?>