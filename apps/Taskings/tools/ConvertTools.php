<?php

namespace apps\Taskings\tools;

use \DOMDocument;

/**
 * Description of ConvertTools
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Nov 19, 2015
 */
class ConvertTools {

    public static function getDom($company_code, $company_id, $company_name, $obs) {
        $doc = new DOMDocument('1.0', 'UTF-8');
        $doc->formatOutput = true;

        $root = $doc->createElement("orders");
        $doc->appendChild($root);

        $c = $doc->createElement('company');
        $code = $doc->createElement('code');
        $code->appendChild(
                $doc->createTextNode($company_code)
        );
        $c->appendChild($code);
        $c->setAttribute('id', $company_id);

        $name = $doc->createElement('name');
        $name->appendChild(
                $doc->createTextNode($company_name)
        );
        $c->appendChild($name);

        $delivery = $doc->createElement('delivery');
        $delivery->appendChild($doc->createTextNode('csv'));
        $c->appendChild($delivery);
        
        $notes = $doc->createElement('notes');
        $notes->appendChild($doc->createTextNode($obs));
        $c->appendChild($notes);

        $root->appendChild($c);
        
        return $doc;
    }
    
    public static function getOrder($doc, $root, $value) {
        $order = $doc->createElement("order");
        $root->appendChild($order);
        $order->setAttribute('dt', $value['order_date']);
        $order->setAttribute('id', $value['order_code']);

        $order->setAttribute('total_amount', 0);
        $order->setAttribute('total_quantity', 0);
        return $order;
    }
    
    public static function setAgent($doc, $order, $value) {
        $agent = $doc->createElement("agent"); // agent element
        $order->appendChild($agent);

        $name = $doc->createElement("name"); // agent name
        $name->appendChild(
                $doc->createTextNode($value['agent_name'])
        );
        $agent->appendChild($name);

        $code = $doc->createElement("code"); // agent code
        $code->appendChild(
                $doc->createTextNode($value['agent_code'])
        );
        $agent->appendChild($code);
        
        $team = $doc->createElement("team"); // agent code
        $team->appendChild(
                $doc->createTextNode($value['agent_team'])
        );
        $agent->appendChild($team);
        
        return $doc;
    }
    
    public static function setClient($doc, $order, $value) {
        $customer = $doc->createElement("customer"); // customer element
        $order->appendChild($customer);

        $name = $doc->createElement("name"); // customer name
        $name->appendChild($doc->createTextNode($value['client_name']));
        $customer->appendChild($name);
        
        $fiscalname = $doc->createElement("fiscalname"); // customer name
        $fiscalname->appendChild($doc->createTextNode($value['client_fname']));
        $customer->appendChild($fiscalname);

        $code = $doc->createElement("code"); // customer code
        $code->appendChild($doc->createTextNode($value['client_code']));
        $customer->appendChild($code);
        /* $client['nif'], //11
          $client['morada'], //12
          $client['zip'], //13
          $client['localidade'] //14
         */

        $tin = $doc->createElement("tin"); // customer name
        $tin->appendChild($doc->createTextNode($value['client_nif']));
        $customer->appendChild($tin);

        $zip = $doc->createElement("zip"); // customer name
        $zip->appendChild($doc->createTextNode($value['client_zip']));
        $customer->appendChild($zip);

        $location = $doc->createElement("location"); // customer name
        $location->appendChild($doc->createTextNode($value['client_locality']));
        $customer->appendChild($location);

        $address = $doc->createElement("address"); // customer name
        $address->appendChild(
                $doc->createTextNode($value['client_address'])
        );
        $customer->appendChild($address);

        return $doc;
    }
    
    
    public static function setProduct($doc, $parent, $value) {
        $product = $doc->createElement("product"); // product element
        $parent->appendChild($product);
        
        if (isset($value['stock_date'])) {
            $product->setAttribute('dt', $value['stock_date']);
        }

        $id = $doc->createElement("id"); // product id
        $id->appendChild($doc->createTextNode($value['product_code']));
        $product->appendChild($id);

        $name = $doc->createElement("name"); // product name
        $name->appendChild($doc->createTextNode($value['product_name']));
        $product->appendChild($name);

        $barcode = $doc->createElement("barcode"); // product barcode
        $barcode->appendChild($doc->createTextNode($value['product_code']));
        $product->appendChild($barcode);

        $quantity = $doc->createElement("quantity"); // product quantity
        $quantity->appendChild($doc->createTextNode(intval($value['quantity'])));
        $product->appendChild($quantity);

        $amount = $doc->createElement("amount"); // product amount
        $amount->appendChild($doc->createTextNode(intval($value['quantity'])));
        $product->appendChild($amount);
        
        
        return $doc;
    }
    
    public static function getStockDom($company_code, $company_id, $company_name, $obs) {
        $doc = new DOMDocument('1.0', 'UTF-8');
        $doc->formatOutput = true;

        $root = $doc->createElement("stocks");
        $doc->appendChild($root);

        $c = $doc->createElement('company');
        $code = $doc->createElement('code');
        $code->appendChild(
                $doc->createTextNode($company_code)
        );
        $c->appendChild($code);
        $c->setAttribute('id', $company_id);

        $name = $doc->createElement('name');
        $name->appendChild(
                $doc->createTextNode($company_name)
        );
        $c->appendChild($name);

        $delivery = $doc->createElement('delivery');
        $delivery->appendChild($doc->createTextNode('csv'));
        $c->appendChild($delivery);
        
        $notes = $doc->createElement('notes');
        $notes->appendChild($doc->createTextNode($obs));
        $c->appendChild($notes);

        $root->appendChild($c);
        
        return $doc;
    }

}
