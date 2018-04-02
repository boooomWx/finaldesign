<?php
/**
 * Created by PhpStorm.
 * User: jeremywei
 * Date: 2018/3/11
 * Time: 21:29
 */

class SubmitPay
{
    public function submit($bizBody,$oid){
        require (APPPATH . 'third_party/alipay/AopSdk.php');
        //构造参数
        $aop = new AopClient ();
        $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
        $aop->appId = '2018030502318384';
        $aop->rsaPrivateKey = 'MIIEpAIBAAKCAQEA1NxkYRpTlMJMAlvEUsKjksVsfYdatIn7sWkH11LdN8YPrMnx2F09uOUPRg/a8Mke/tjNFDpjohJ5En78lfdjyR7BxTv2RG/vR+b78dsbiBV08C+TqR8TuDBYSVM8GKgUMej/mPEY9xE22gli+Aa1E7oDg9UEj659J8ezJ/bp/ZwcB8i99JvtbNzNPFyrAyrgbAMvV0VtOFoa7xtUrR560i0JO1y6EzsLeaA4c+tXUykDbwL6Z329Y0vtChyP9R9xBpfl3a+ESI7OoxwHxa3j84kGUZ26TPaxV0jqWmQA6KRL0WtoWR9Iy5WgPQN+34I/goULwlAFGmR19bVDgln1qQIDAQABAoIBAQC4Mcqu+EARPxzVAaHeV82CKVKbQXBtP+XL/G4rluoU5FAWHl4n82+Aur4/y2KS8AbhUqwL8AbdbYzVQ4vBHeV8WSAmU5/kUtRFbQzhmc+2L5MUcKcfNuQyg6syMFOVpoRrOAtNxnvq+Dt16593rx4sZs+52bBrwPtOXBGc6J5MtKCNYeIHYdUr10Dkefn3z4EDZF47We9OPV4pyS0SzpmH20RiG4aDwLZ2wXD8vCuDTzmYW4cJ4z0FJAEiTkfpHUbdD7GlizX0z7Ed2uiITFoKEZjlj7apq1TITFG9mJaN9FFrhYZ86vHA5W9MCPaqwAZk3hG1PxzZChRqyMEkWQiBAoGBAPH2SLexlG/nUBP3kMXcy21IKCeX08+o6ay9jQZgd+fqk4W/I4DPZgKdekrcjQmc5PDB5L6dBAorHx18BsEuSbSpHsz/CfQLrDTcO4lZRgZNX+OYY6Kn4pTqBW0IVsRRe67E8aXagsd7fvqhHBgh1PStcUrVsRCdxC/IrUees6hRAoGBAOE14uwfuHDu67hO9n0BdXPN2dcZuInNHfSrGx6ryqmlDbE77xS/wKzK3llTCZl+JvGcuzbzLYwgH6xm9sf+pYZwH3K43BZQ5K/A7V3JFL7yWNhxbDKyOmuY16pKXyh9vYA3wdh57/INuJlVP2/cWOMA7yjbGjnfYt7+LIRa4nnZAoGBAMyTsmn18A4pYlBvie1xQGJWlvTa7xBtvZz66yjQGbFxaWe08xyuvo5JfaOcFHdjO0LAfVoYwdijGvy/56ogK9te/pbOsCiyUdijuIbpf0ZG12NEbkGRdwb3Ur0cRthYGJ3tEG9tcBOfu/3GiE1zFW4G03o1cS8eZUkNgEzExxvxAoGAKAfNAw2MWj6NlaArfgLBXskrPGms/ImCFphHZMdCaa8V5PfzQivnUo9owFXbMfZTc8TZHiZRZUPcfWd73AauY1wQqvKi5DCSxY60YmQ4lMw88JQQmF5HthJf2zwG+AqJoX3HrfPWq562vkKB2R9AiXEEEa4IVlsXlu10+j2xXdkCgYARik2QhaOt8TY2NxfHL2Soz61PcR66Bs1FFVuHQ6/0j0cPXnAaPv8MgW0rJcjmzXnjcP1icevyKr++qWOZD8vPvKKYo4GW8xiftLEJZ7QTNRBZIOHnUlBkgxdDacdqFak8rnFkCtiH6SJAA/qyNtEDIUq5MpEkqfVUqdl2BlWEeQ==';
        $aop->apiVersion = '1.0';
        $aop->signType = 'RSA2';
        $aop->postCharset= 'utf-8';
        $aop->format='json';
        $request = new AlipayTradePagePayRequest ();
        $request->setReturnUrl(site_url('index.php/trade/success?oid='.$oid));
        $request->setNotifyUrl(site_url('index.php/trade/pay'));
        $request->setBizContent(json_encode($bizBody));
        $result = $aop->pageExecute ($request);
        return $result;
    }
}