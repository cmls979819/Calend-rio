 <?php
    error_reporting(0);
    
    class Calendar {
    var $bgColor = "#FFFFFF";
    var $mouseOverColor = "#9999FF";
    var $lineColor = "#000000";
    var $fontColor = "#000000";
    var $eventBgColor = "#BBBBFF";
    var $eventStyle = "";
    var $tableWidth = 500;
    var $day;
    var $month;
    var $year;
    var $events = array();
    var $mes_anterior;
    var $proximo_mes;
    var $nome_mes;
    
        
    function Calendar($d = 0, $m = 0, $y = 0) {
    $this->day = (int) $d ? (int) $d : date("j");
    $this->month = (int) $m ? (int) $m : date("n");
    $this->year = (int) $y ? (int) $y : date("Y");
    }
    function setEvent($d) {
    $this->events[] = $d;
    }
    function defineEvents($listEvents) {
    $this->events = $listEvents;
    }
    
    function show($data_func,$write) {  

   if(empty($data_func)){//navegaçao entre os meses
       $dia = ltrim(date('d'),"0");
       $mes = date('m');
       $ano = date('Y');
       $data_func = $dia."/".$mes."/".$ano;
   }else{
       $data = explode('/',$data_func);//nova data
      $dia = $data[0];
      $mes = $data[1];
      $ano = $data[2];
   }
   if($mes==1){//mês anterior se janeiro mudar valor
       $mes_ant = 12;
       $ano_ant = $ano - 1;
   }else{
       $mes_ant = $mes - 1;
       $ano_ant = $ano;
   }
   
   if($mes==12){//proximo mês se dezembro tem que mudar
       $mes_prox = 1;
       $ano_prox = $ano + 1;
   }else{
       $mes_prox = $mes + 1;
       $ano_prox = $ano;
   }
   
   
   
if ($mes == 01) {$this->nome_mes = "JANEIRO"; }
if ($mes == 02) {$this->nome_mes = "FEVEREIRO"; }
if ($mes == 03) {$this->nome_mes = "MARÇO";}
if ($mes == 04) {$this->nome_mes = "ABRIL";}
if ($mes == 05) {$this->nome_mes = "MAIO";}
if ($mes == 06) {$this->nome_mes = "JUNHO";}
if ($mes == 07) {$this->nome_mes = "JULHO";}
if ($mes == 08) {$this->nome_mes = "AGOSTO";}
if ($mes == 09) {$this->nome_mes = "SETEMBRO";}
if ($mes == 10) {$this->nome_mes = "OUTUBRO";}
if ($mes == 11) {$this->nome_mes = "NOVEMBRO";}
if ($mes == 12) {$this->nome_mes = "DEZEMBRO";}        
        
      $this->mes_anterior = $dia."/"."0".$mes_ant."/".$ano_ant;
      $this->proximo_mes = $dia."/"."0".$mes_prox."/".$ano_prox;
        
    $return = "";
    $return = '<div class="fundo-tabela">';
    $return .= "<table class='tabela'>\r\n";
    $return .= "\t<tr bgcolor='#FFFFFF'>\r\n";
    
    $return .= "<td class='mes-seta-esquerda'><a href=?data=".$this->mes_anterior." title='Mes anterior' class='agenda'>  < </a> </td>";/*mês anterior*/
    
    
    $return .= "<td colspan='5' class='mes' align='center'>".$this->nome_mes.'/'.$ano."</td>";/*mes atual e ano*/   
    $return .= "<td class='mes-seta-direita'><a href=?data=".$this->proximo_mes." title='Proximo mês' class='agenda'>  > </a> </td>";/*Proximo mês*/
    
    
    $return .= "\t</tr>\r\n";
        $return .= "\t<tr>\r\n";
    $return .= "\t<td colspan='7' align='right'><strong>Ir para:</strong><form name='form1' action='recanto1.php' method='GET'>
<select name='dia' >
    <option value='1'>01</option>
        <option value='2'>02</option>
        <option value='3'>03</option>
        <option value='4'>04</option>
        <option value='5'>05</option>
        <option value='6'>06</option>
        <option value='7'>07</option>
        <option value='8'>08</option>
        <option value='9'>09</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
        <option>13</option>
        <option>14</option>
        <option>15</option>
        <option>16</option>
        <option>17</option>
        <option>18</option>
        <option>19</option>
        <option>20</option>
        <option>21</option>
        <option>22</option>
        <option>23</option>
        <option>24</option>
        <option>25</option>
        <option>26</option>
        <option>27</option>
        <option>28</option>
        <option>29</option>
        <option>30</option>
        <option>31</option>
</select>
  <select name='mes' >
      <option>01</option>
        <option>02</option>
        <option>03</option>
        <option>04</option>
        <option>05</option>
        <option>06</option>
        <option>07</option>
        <option>08</option>
        <option>09</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
  </select>
  <select name='ano'>      
        <option >2009</option>
        <option>2010</option>
        <option>2011</option>
        <option>2012</option>
        <option>2013</option>
        <option>2014</option>
        <option>2015</option>
        <option>2016</option>
        <option>2017</option>
        <option>2018</option>
        <option>2019</option>
        <option>2020</option>
  </select>  
  <button type='submit' class='btn btn-info'>ok</button>
    </form></td>\r\n";
    $return .= "\t</tr>\r\n";
    $return .= "\t<tr>\r\n";
    $return .= "\t\t<td class='sem'><b>Dom</b></td>\r\n";
    $return .= "\t\t<td class='sem'><b>Seg</b></td>\r\n";
    $return .= "\t\t<td class='sem'><b>Ter</b></td>\r\n";
    $return .= "\t\t<td class='sem'><b>Qua</b></td>\r\n";
    $return .= "\t\t<td class='sem'><b>Qui</b></td>\r\n";
    $return .= "\t\t<td class='sem'><b>Sex</b></td>\r\n";
    $return .= "\t\t<td class='sem'><b>Sab</b></td>\r\n";
    $return .= "\t</tr>\r\n";
    $return .= "\t<tr>\r\n";
    $tempo = mktime(0, 0, 0, $this->month, 1, $this->year);
    $fwd = date("w", $tempo);
    $td = date("t", $tempo);
    $iDay = 1;
    $iTmp = 0;
    for($i = 0; $i < $fwd; $i++) {
    $return .= "\t\t<td><span></span></td>\r\n";
    $iTmp++;
    }
    while($iDay <= $td) {
    $tmp = $iTmp % 7;
    if($tmp == 0 && $iTmp != 0) 
    $return .= "\t</tr>\r\n\t<tr>\r\n";
    if(in_array($iDay, $this->events)) {
    $thisBg = $this->eventBgColor;
    switch($this->eventStyle) {
    case "bold":
    $aDay = "<b>{$iDay}</b>";
    break;
    case "italic":
    $aDay = "<i>{$iDay}</i>";
    break;
    case "bold-italic":
    $aDay = "<b><i>{$iDay}</i></b>";
    break;
    default:
    $aDay = $iDay.'<div class="reservado" align="center">Reservado</div>';
    }
    } else {
    $thisBg = $this->bgColor;
    $aDay = $iDay;
    
    }
    $return .= "\t\t<td ";
    $return .= "align='left' ";
    $return .= "class='evt' valign='top'";
    $return .= "style='cursor: pointer; color: " . $this->fontColor . ";' ";
    $return .= "onmouseover=\"this.bgColor = '" . $this->mouseOverColor . "'\" ";
    $return .= "onmouseout=\"this.bgColor = '" . $thisBg . "'\">";
    $return .= $aDay;
    $return .= "</td>\r\n";
    $iDay++;
    $iTmp++;
    }
    while(($iTmp % 7) > 0) {
    $return .= "\t\t<td bgcolor='" . $this->bgColor . "'><span></span></td>\r\n";
    $iTmp++;
    }
    $return .= "\t</tr>\r\n</table>\r\n";
    if($write) {
    echo $return;
    } else {
    return $return;
    }
    }
    }   
?>
recanto1.php
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Recanto da Preguiça - Viver com Lazer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css">
	<link rel="stylesheet" type="text/css" href="css/plan.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="css/font-awesome-ie7.min.css">
	<![endif]-->
	<!-- End Font Awesome -->
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,400italic" id="custom_font">
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sinister.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="js/fancyBox/jquery.fancybox.css" type="text/css" media="screen" />
    
	<!--[if lte IE 9]>
		<link rel="stylesheet" type="text/css" href="css/ie.css"/>
	<![endif]-->
	<!--[if lte IE 8]>
		<script type="text/javascript" src="js/vendor/selectivizr.min.js"></script>
		<script type="text/javascript" src="js/vendor/excanvas.min.js"></script>
		<script type="text/javascript" src="js/vendor/respond.min.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="favicon.ico">
	<script type="text/javascript" src="js/vendor/modernizr.min.js"></script>
	<script type="text/javascript" src="js/vendor/jquery.min.js"></script>
	<script type="text/javascript" src="js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/vendor/retina.js"></script>
	<script type="text/javascript" src="js/fancyBox/jquery.fancybox.pack.js"></script>
	<style type="text/css"> 
a.footer:link 
{ 
 text-decoration:none;
 color:#494949; 
} 
a.footer:visited{
 text-decoration:none;
 color:#494949;	
}
</style>


    <!-- /* 
    --------------------------------------------------------
    
    Item Information
    
    --------------------------------------------------------
    
    Author: IncisiveStudio
    Author UI: http://IncisiveStudio.com
    Item Name: Sinister
    Description: CSS Animation and Effects
    Version: 1.6
    
    --------------------------------------------------------
    */ -->
    
</head>

<body>
  <?php
  $data = isset($_GET['data']) ? $_GET['data'] : false;
  ?>
	<div class="layout">
		<!-- Header -->
		<header>
			<div class="header">
				<div class="topo">
				<div class="container">
					<div class="row">
						<div class="span5">
<a href="index.php"><img src="images/logo.png" alt="Recanto da Preguiça"></a>
						</div>
						<nav>
            <div class="span7 text-right mainmenu">
              
<ul>
  <li> <a href="index.php">Início</a></li>
  <li> <a href="#sobre">Sobre</a></li>
  <li> <a href="#galeria">Galeria</a></li>
  <li> <a href="#agenda" >Agenda</a></li>
  <li> <a href="#orçamento">Solicite um Orçamento</a></li>
</ul>

						</div>
            </nav>
					</div>
					</div>
				</div>
			</div>
		</header>
		<div class="image">
				<div class="row">
						<img src="images/aerea.jpg" alt="" width="100%" height="100%">
				</div>
		</div>

		<!-- End Header -->

    <!-- Sobre -->

    <div id="sobre" class="sobre">
       <div class="container">
         <div class="row">
           <div class="span7">
            <?php
include ("config.php");
// query SQL
  $busca = "SELECT * FROM `recanto1` WHERE id=1";

  // Executa a query (o recordset $rs contém o resultado da query)
  $rs = mysql_query($busca);
  
  // Loop pelo recordset $rs
  while($row = mysql_fetch_array($rs)) {

     // Escreve o valor da coluna FirstName e BirthDate

    ?>
             <h3 class="sobre"><?php echo $row['titulo']; ?></h3><p>
               <h4 class="sobre"><?php echo $row['sobre']; ?></h4>
             </p>
           </div>
           <?php
         }
         ?>
           <div class="span5"><img class="lateral" src="images/lateral.png" alt=""></div>
         </div>
       </div>
    </div>

    <!-- End Sobre -->

   <!-- Album de Fotos -->
		<div class="album" id="galeria">
		<div class="container">
      <div class="row">
        <div class="span12">
          <div class="page-header">
            <h2 class="album">Álbum de Fotos</h2>
          </div>
        </div>
      </div>

          <ul class="row">
<?php
 //URL onde o arquivo PHP vai ficar
  $pasta_fotos = "admin/fotos-r1";

  //Início da função
  $fotos = array();

  //Loop que percorre a pasta das imagens e armazena o nome de todos os arquivos
  foreach(glob($pasta_fotos . '/{*.jpg,*.gif,*.jpeg}', GLOB_BRACE) as $image) {
  
  $fotos[] = $image;  
  }
  //Verifica se deve exibir a lista ou uma foto
  if (!isset($_GET["image"])) {
  
  //Faz o loop pelo folder de imagens
  for($i=0; $i < count($fotos); $i++) {
  ?>       
            <li class="span3">
                <div class="blog-post">
                    <div class="ImageWrapper">
                        <img class="img-responsive" src="<?php echo $fotos[$i]; ?>" alt="">
                        <div class="ImageOverlayH"></div>
                        <div class="Buttons StyleH">
                            <span class="WhiteRounded"><a class="fancybox" href="<?php echo $fotos[$i]; ?>"><i class="fa fa-search"></i>
                            </a>
                            </span>

                        </div>
                    </div>
                </div>
            </li>

    <?php } }?>
    </ul>
    </div>
    </div>
    <!-- end album -->

     <!-- calendario -->

     <div class="calendario"  id="agenda">
       <div class="container">
         <div class="row">
           <div class="span12">
             <div class="page-header">
               <h2>
                 Agenda de Eventos -  Recanto da Preguiça 1
               </h2>
             </div>
                 <?php 
    require("calendario.php");
  require("config.php");
  
$data_request = $_REQUEST["data"]; list($dia1, $mes1, $ano1, explode('/', $data)); $calendario = new Calendario($dia1, $mes1, $ano1);

$n = 0;
if ($mes1 == 1) {$nome_mes = "JANEIRO"; $n=31; }
if ($mes1 == 2) {$nome_mes = "FEVEREIRO"; 
               $bi = $ano % 4;//anos multiplos de 4 são bixestos
               if($bi == 0){
                   $n = 29;
               }else{
                   $n = 28;
               }
         
}
if ($mes1 == 3) {$nome_mes = "MARÇO"; $n = 31;}
if ($mes1 == 4) {$nome_mes = "ABRIL"; $n = 30; }
if ($mes1 == 5) {$nome_mes = "MAIO"; $n = 31;}
if ($mes1 == 6) {$nome_mes = "JUNHO"; $n = 30;}
if ($mes1 == 7) {$nome_mes = "JULHO"; $n = 31;}
if ($mes1 == 8) {$nome_mes = "AGOSTO"; $n = 31;}
if ($mes1 == 9) {$nome_mes = "SETEMBRO"; $n = 30;}
if ($mes1 == 10) {$nome_mes = "OUTUBRO"; $n = 31;}
if ($mes1 == 11) {$nome_mes = "NOVEMBRO"; $n = 30;}
if ($mes1 == 12) {$nome_mes = "DEZEMBRO"; $n = 31;}


$eventos = array();

function eventos ($total, $data1) {
    $cont = 0;    
while ( $cont <= $total ){
  global $eventos;
  $data_final = date( 'd', $data1) . PHP_EOL.'<br>';
  $eventos[] = $data_final;
  //array_push($eventos, $data_final);
  $data1 += 86400;
  $cont++;
  }   
    return $eventos;
  } // fecha function

       for($i = 1; $i <= $n; $i++ ){/*agora vamos no banco de dados verificar os evendos*/
               
      $dtevento = $ano1."-".$mes1."-".$i;
       
       $mysql = "SELECT DATEDIFF (data_fim, data_in)AS DATA_DIF, data_in from agenda where data_in = '".$dtevento."'";

           $sqlag = mysql_query($mysql) or die(mysql_error()); /*quantos eventos tem para o mes*/
    
    while ($lista = mysql_fetch_assoc($sqlag)) {
        $num = $lista["DATA_DIF"];
        $d1 = $lista["data_in"];
        
        $date = explode('-', $d1);
        $date = $date[2].'-'.$date[1].'-'.$date[0];
        $timestamp1 = strtotime($date);
        $call_eventos = eventos ($num,$timestamp1);
    }

} // fecha for    
  //foreach ($eventos as $indice=>$valor) {echo "Print vetor: ".$indice."-".$valor;}
  $cal->defineEvents($call_eventos);
  $mostra = true;
  $cal->show($data_request,$mostra);
?>

  <br>
  <br>
  </div>
    <br>
  <br>
           </div>
         </div>
       </div>
     </div>

     <!-- end calendario -->

		<!--  -->
		<div class="contato-page2" id="orçamento">
			<div class="container">
				<div class="row">
					<div class="span12">
            <div class="square"></div>
						<div class="page-header">
							<h2>Faça agora seu orçamento</h2>
						</div>		
					</div>
				</div>
				<div class="row">
					<div class="span4">
						<h3>Informações</h3>
<?php
include ("config.php");
// query SQL
  $busca = "SELECT * FROM `configuracoes`";

  // Executa a query (o recordset $rs contém o resultado da query)
  $rs = mysql_query($busca);
  
  // Loop pelo recordset $rs
  while($row = mysql_fetch_array($rs)) {

     // Escreve o valor da coluna FirstName e BirthDate

    ?>
              <address>
        <em class="icon-map-marker pull-left icon-fixed-width icon-2x"></em>
        <p class="clearfix">
          <?php echo $row['endereco']; ?>, 
          <br>
          <?php echo $row['bairro']; ?>, <?php echo $row['cidade']; ?>
        </p>
      </address>
      <address>
        <em class="icon-headphones pull-left icon-fixed-width icon-2x"></em>
        <p class="clearfix">
          <?php echo $row['tel1']; ?>
          <br>
          <?php echo $row['tel2']; ?>
        </p>
      </address>
      <address>
        <em class="icon-envelope  pull-left icon-fixed-width icon-2x"></em>
        <p class="clearfix">
         <?php echo $row['email']; ?>
        </p>
        <?php
    }
    ?>
      </address>
					</div>
					<div class="span8"><br>
						<form action="enviar.php" method="post">
							<fieldset>
          <div class="controls controls-row">
              <input id="name" name="name" type="text" class="span4" placeholder="Nome completo"> 
              <input id="email" name="email" type="email" class="span2" placeholder="Seu e-mail">
              <input id="telefone" name="telefone" type="tel" class="span2" placeholder="Seu telefone">
          </div>
          <div class="controls controls-row">
              <input id="evento" name="evento" type="text" class="span4" placeholder="Tipo de evento"> 
              <input id="q_pessoas" name="q_pessoas" type="number" class="span4" placeholder="Quantas pessoas?">
          </div>
          <div class="controls controls-row">
              <input id="chegada" name="chegada" type="text" class="span4" placeholder="Data de chegada"> 
              <input id="partida" name="partida" type="text" class="span4" placeholder="Data de partida">
          </div>
          <div class="controls">
              <textarea id="mensagem" name="mensagem" class="span8" placeholder="Sua mensagem" rows="5"></textarea>
          </div>
          
          <div class="controls controls-row">
              <button id="contact-submit" type="submit" class="btn btn-transparent btn-large input-block-level">enviar</button>
          </div>
          </fieldset>
      </form>

					</div>
				</div>
			</div>
		</div>

		<!-- End Contato -->
		<!-- Mapa -->
		<div class="map">
			<div id="map"></div>
		</div>

		<!-- End Mapa -->
		<!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <?php
include ("config.php");
// query SQL
  $busca = "SELECT * FROM `configuracoes`";

  // Executa a query (o recordset $rs contém o resultado da query)
  $rs = mysql_query($busca);
  
  // Loop pelo recordset $rs
  while($row = mysql_fetch_array($rs)) {

     // Escreve o valor da coluna FirstName e BirthDate

    ?>
            <div class="span8"><p>©<?php echo $row['copyright']; ?></p></div>
            
            <div class="span4"><p class="direita">Desenvolvido por: <a class="footer" href="http://www.joaocarvalhowd.com.br" target="_blank">João Carvalho</a></p></div>
          </div>
      </div>
      <?php
          }
          ?>
    </footer>
    
    <!-- javascript -->

	
    <script src="js/custom.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function($){
        $(".fancybox").on("click", function(){
            $.fancybox({
                helpers: {
                    overlay: {
                    locked: false
                    }
                },
              href: this.href,
              type: $(this).data("type")
            }); // fancybox
            return false   
        }); // on

    }); // ready
    </script>

    <script type="text/javascript" src="js/vendor/jquery.cookie.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script type="text/javascript" src="js/vendor/gmap3.min.js"></script>
<script type="text/javascript">
// inicializa jquery
 $(function(){
						
// inicializa plugin gmap3			 
$("#map").gmap3({
    map:
	{
      // local padrão onde o mapa irá aparecer quando carregado
	  address:"Bairro do Maracanã,Jarinu, São Paulo, Brasil",
      options:
	  {
		// zoom inicial (aproximação)  
        zoom:15,
		// opções de controle do tipo do mapa (ruas, satélite, etc).
		// mapTypeControl como FALSE não mostra opções
        mapTypeControl: true,
        mapTypeControlOptions: 
		{
          // define controles no formato dropdown
		  style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
        },
        // permite navegar com o botão scroll do mouse
		scrollwheel: true,
		// mostra bonequinho para habilitar modo streetview
        streetViewControl: true
      }
	},
	// marcadores
	marker:{
	// valores (localização dos marcadores)	
    values:[
	// pode ser uma latitude/longitude
      {latLng:[-23.149947, -46.716035], data:"Recanto da Preçuiça"},
    ]
  }
  }); 
});     
</script> 
	<!--[if lte IE 9]>
		<script type="text/javascript" src="js/vendor/jquery.placeholder.min.js"></script>
		<script type="text/javascript">
			/* <![CDATA[ */
			jQuery.noConflict();
			(function ($) {
				$(function () {
					// Placeholder
					$('input, textarea').placeholder();
				});
			})(jQuery);
			/* ]]> */
		</script>
	<![endif]-->
	<script type="text/javascript" src="js/plugins.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript">
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'XX-XXXXXXXX-X', 'example.com');
		ga('send', 'pageview');
	</script>
</body>

</html>


