<?php

class ProductService
{

    protected $mysqliClient;
    protected $mysqliInstance;

    //Constructor
    public function __construct(JoshcamMysqli $mysqliCli)
    {

        //aqui el JoshcamMysqli deberia ser una clase custom por si en algun futuro tenemos que cambiar la libreria que conecta con mysqli
        //$this->mysqliClient = new JoshcamMysqli();
        $this->mysqliClient = $mysqliCli;

        $this->mysqliInstance = $this->mysqliClient->getInstance();
    }

    //Metodo para hacer login en mysql
    public function add($params = [])
    {

        try {
            //Esperamos que el array de parametros contenga el username
            if (array_key_exists('id', $params) &&
                !empty($params['id']) &&
                !is_null($params['id']) &&
                is_numeric($params['id'])) {
                $id = $params['id'];
            } else {
                throw new Exception("invalid product id");
            }

            //Esperamos que el array de parametros contenga el password
            if (array_key_exists('name', $params) &&
                !empty($params['name']) &&
                !is_null($params['name'])) {
                $name = $params['name'];
            } else {
                throw new Exception("invalid product name");
            }



            $data = array("id" => $id,
                           "name" => $name
            );

            $id = $this->mysqliInstance->insert('products', $data);

            if ($id) {
                return 'product was created. Id=' . $id;
            } else {
                throw new Exception('insert failed: ' . $this->mysqliInstance->getLastError());
            }

            //Pendiente aqui definir el estandar de respuesta del metodo
        } catch (Exception $ex) {
            //Pendiente aqui para definir como definimos el estandar de respuesta de error, no se si devolver un array o directamente la excepcion y asi mismo saber si voy a responder el http code
            //$data = 'Error: ' . $ex->getMessage();
            throw $ex;
        }

        return $data;
    }

    //Metodo para remover productos
    public function remove($params = [])
    {

        try {
            //Esperamos que el array de parametros contenga el username
            if (array_key_exists('id', $params) &&
                !empty($params['id']) &&
                !is_null($params['id']) &&
                is_numeric($params['id'])) {
                $id = $params['id'];
            } else {
                throw new Exception("invalid product id");
            }

            $this->mysqliInstance->where('id', $id);

            if ($this->mysqliInstance->delete('products')) {
                return 'successfully deleted';
            } else {
                throw new Exception('delete failed: ' . $this->mysqliInstance->getLastError());
            }

            //Pendiente aqui definir el estandar de respuesta del metodo
        } catch (Exception $ex) {
            //Pendiente aqui para definir como definimos el estandar de respuesta de error, no se si devolver un array o directamente la excepcion y asi mismo saber si voy a responder el http code
            //$data = 'Error: ' . $ex->getMessage();
            throw $ex;
        }

        return $data;
    }

    //Metodo para actualizar
    public function update($params = [])
    {

        try {
            //Esperamos que el array de parametros contenga el username
            if (array_key_exists('id', $params) &&
                !empty($params['id']) &&
                !is_null($params['id']) &&
                is_numeric($params['id'])) {
                $id = $params['id'];
            } else {
                throw new Exception("invalid product id");
            }

            //Esperamos que el array de parametros contenga el password
            if (array_key_exists('name', $params) &&
                !empty($params['name']) &&
                !is_null($params['name'])) {
                $name = $params['name'];
            } else {
                throw new Exception("invalid product name");
            }

            $data = array(
                'name' => $name
            );

            $this->mysqliInstance->where('id', $id);

            if ($this->mysqliInstance->update('products', $data)) {
                return $this->mysqliInstance->count . ' records were updated';
            } else {
                throw new Exception('update failed: ' . $this->mysqliInstance->getLastError());
            }

            //Pendiente aqui definir el estandar de respuesta del metodo
        } catch (Exception $ex) {
            //Pendiente aqui para definir como definimos el estandar de respuesta de error, no se si devolver un array o directamente la excepcion y asi mismo saber si voy a responder el http code
            //$data = 'Error: ' . $ex->getMessage();
            throw $ex;
        }

        return $data;
    }

    //Metodo para actualizar
    public function list()
    {

        try {
            $products = $this->mysqliInstance->get('products'); //contains an Array of all products

            if (is_array($products) &&
                count($products) > 0) {
                return $products;
            } else {
                throw new Exception('select failed');
            }

            //Pendiente aqui definir el estandar de respuesta del metodo
        } catch (Exception $ex) {
            //Pendiente aqui para definir como definimos el estandar de respuesta de error, no se si devolver un array o directamente la excepcion y asi mismo saber si voy a responder el http code
            //$data = 'Error: ' . $ex->getMessage();
            throw $ex;
        }

        return $data;
    }
}
