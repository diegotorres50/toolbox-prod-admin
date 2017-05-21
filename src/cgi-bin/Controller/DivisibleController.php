<?php

use \Interop\Container\ContainerInterface as ContainerInterface;

class DivisibleController
{
    public function validate($request, $response, $args)
    {

        try {
            $arraySource = array(1, 3, 5, 8, 15);

            $arrayFinal = array();

            foreach ($arraySource as &$value) {
                if ($value % 3 == 0 &&
                    $value % 5 == 0) {
                    $arrayFinal[] = 'FizzBuzz';
                } elseif ($value % 3 == 0 ||
                    $value == 3) {
                    $arrayFinal[] = 'Fizz';
                } elseif ($value % 5 == 0 ||
                    $value == 5) {
                    $arrayFinal[] = 'Buzz';
                }
            }

            $feedback['result'] = $arrayFinal;
        } catch (Exception $e) {
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
