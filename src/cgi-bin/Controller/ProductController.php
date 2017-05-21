<?php

use \Interop\Container\ContainerInterface as ContainerInterface;

class ProductController
{
    protected $ci;

    //Constructor
    public function __construct(ContainerInterface $ci)
    {
        $this->ci = $ci;
    }

    public function add($request, $response, $args)
    {

        $feedback = array();

        $params = array();

        $entry = array();

        try {
            //Parametros por get query string
            $queryParams = $request->getQueryParams();

            //Parametros por body (post)
            $bodyParams = $request->getParsedBody();

            $feedback['entry'] = array_merge($queryParams, $bodyParams);

            if (array_key_exists('id', $bodyParams) &&
              !empty($bodyParams['id']) &&
              is_numeric($bodyParams['id']) &&
              !is_null($bodyParams['id'])) {
                $params['id'] = $bodyParams['id'];
            } else {
                throw new Exception("invalid product id");
            }

            if (array_key_exists('name', $bodyParams) &&
              !empty($bodyParams['name']) &&
              !is_null($bodyParams['name'])) {
                $params['name'] = $bodyParams['name'];
            } else {
                throw new Exception("invalid product name");
            }

            //Obtenemos la dependencia de conexion mysql para usarla
            $mysqliCli = $this->ci->get('mysqli');

            $authService = new ProductService($mysqliCli);

            $data = $authService->add($params);

            $feedback['status'] = 1;
            $feedback['code'] = 200;
            $feedback['data'] = $data;
        } catch (Exception $e) {
            $feedback['status'] = 0;
            $feedback['code'] = 400;
            $feedback['data'] = null;
            $feedback['error'] = array();
            $feedback['error']['code'] = $e->getCode();
            $feedback['error']['message'] = $e->getMessage();
            $feedback['error']['line'] = $e->getLine();
            $feedback['error']['file'] = $e->getFile();
            $feedback['error']['method'] = __METHOD__;
            $feedback['error']['trace'] = $e->__toString();
        }

        return $response->withJson($feedback, $feedback['code']);
    }

    public function remove($request, $response, $args)
    {

        $feedback = array();

        $params = array();

        $entry = array();

        try {
            //Parametros por get query string
            $queryParams = $request->getQueryParams();

            //Parametros por body (post)
            $bodyParams = $request->getParsedBody();

            $feedback['entry'] = array_merge($queryParams, $bodyParams);

            if (array_key_exists('id', $bodyParams) &&
              !empty($bodyParams['id']) &&
              is_numeric($bodyParams['id']) &&
              !is_null($bodyParams['id'])) {
                $params['id'] = $bodyParams['id'];
            } else {
                throw new Exception("invalid product id");
            }

            //Obtenemos la dependencia de conexion mysql para usarla
            $mysqliCli = $this->ci->get('mysqli');

            $authService = new ProductService($mysqliCli);

            $data = $authService->remove($params);

            $feedback['status'] = 1;
            $feedback['code'] = 200;
            $feedback['data'] = $data;
        } catch (Exception $e) {
            $feedback['status'] = 0;
            $feedback['code'] = 400;
            $feedback['data'] = null;
            $feedback['error'] = array();
            $feedback['error']['code'] = $e->getCode();
            $feedback['error']['message'] = $e->getMessage();
            $feedback['error']['line'] = $e->getLine();
            $feedback['error']['file'] = $e->getFile();
            $feedback['error']['method'] = __METHOD__;
            $feedback['error']['trace'] = $e->__toString();
        }

        return $response->withJson($feedback, $feedback['code']);
    }

    public function update($request, $response, $args)
    {

        $feedback = array();

        $params = array();

        $entry = array();

        try {
            //Parametros por get query string
            $queryParams = $request->getQueryParams();

            //Parametros por body (post)
            $bodyParams = $request->getParsedBody();

            $feedback['entry'] = array_merge($queryParams, $bodyParams);

            if (array_key_exists('id', $bodyParams) &&
              !empty($bodyParams['id']) &&
              is_numeric($bodyParams['id']) &&
              !is_null($bodyParams['id'])) {
                $params['id'] = $bodyParams['id'];
            } else {
                throw new Exception("invalid product id");
            }

            if (array_key_exists('name', $bodyParams) &&
              !empty($bodyParams['name']) &&
              !is_null($bodyParams['name'])) {
                $params['name'] = $bodyParams['name'];
            } else {
                throw new Exception("invalid product name");
            }

            //Obtenemos la dependencia de conexion mysql para usarla
            $mysqliCli = $this->ci->get('mysqli');

            $authService = new ProductService($mysqliCli);

            $data = $authService->update($params);

            $feedback['status'] = 1;
            $feedback['code'] = 200;
            $feedback['data'] = $data;
        } catch (Exception $e) {
            $feedback['status'] = 0;
            $feedback['code'] = 400;
            $feedback['data'] = null;
            $feedback['error'] = array();
            $feedback['error']['code'] = $e->getCode();
            $feedback['error']['message'] = $e->getMessage();
            $feedback['error']['line'] = $e->getLine();
            $feedback['error']['file'] = $e->getFile();
            $feedback['error']['method'] = __METHOD__;
            $feedback['error']['trace'] = $e->__toString();
        }

        return $response->withJson($feedback, $feedback['code']);
    }

    public function list($request, $response, $args)
    {

        $feedback = array();

        $params = array();

        $entry = array();

        try {
            //Obtenemos la dependencia de conexion mysql para usarla
            $mysqliCli = $this->ci->get('mysqli');

            $authService = new ProductService($mysqliCli);

            $data = $authService->list();

            $feedback['status'] = 1;
            $feedback['code'] = 200;
            $feedback['data'] = $data;
        } catch (Exception $e) {
            $feedback['status'] = 0;
            $feedback['code'] = 400;
            $feedback['data'] = null;
            $feedback['error'] = array();
            $feedback['error']['code'] = $e->getCode();
            $feedback['error']['message'] = $e->getMessage();
            $feedback['error']['line'] = $e->getLine();
            $feedback['error']['file'] = $e->getFile();
            $feedback['error']['method'] = __METHOD__;
            $feedback['error']['trace'] = $e->__toString();
        }

        return $response->withJson($feedback, $feedback['code']);
    }
}
