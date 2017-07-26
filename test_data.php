<?php
$title = "Test Page - data and D3";

$content = "<h3> Data </h3>";

include 'layout.php';

//use statements from GitHub example
//https://github.com/artikcloud/sample-webapp-php/blob/master/src/AppBundle/Controller/DefaultController.php

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use ArtikCloud as ArtikCloud;
use ArtikCloud\Configuration as Configuration;
use ArtikCloud\Api as Api;
use ArtikCloud\ApiException as ApiException;

//need to use functions from the DefaultController class/file
using namespace AppBundle\Controller;

//use echo to insert a javascript section into the php
//echo allows you to enter HTML syntax into the php
echo "
	<script type="text/javascript">



	</script>
";

?>