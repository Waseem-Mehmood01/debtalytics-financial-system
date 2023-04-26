<?php
//Returns Date given in Selected Format
function getDateTime($time = 0, $form = "dtLong") {
	Switch($form) {
		case "dtVLong":
		$strform = "D, jS F, Y g:i:s A (\G\M\T O)";
		break;
		case "dtLong":
		$strform = "D, jS F, Y g:i A";
		break;
		case "dtShort":
		$strform = "jS M, Y g:i A";
		break;
		case "dtMin":
		$strform = "j-n-y G:i";
		break;
		case "dLong":
		$strform = "D, jS F Y";
		break;	
		case "dShort":
		$strform = "j-M-Y";
		break;
		case "dMin":
		$strform = "j-n-y";
		case "dOnly":
		$strform = "Y-n-j";
		break;
		case "tLong":
		$strform = "G:i:s (\G\M\T O)";
		break;
		case "tShort":
		$strform = "G:i";
		break;
		case "mySQL":
		$strform = "Y-m-d H:i:s";
		break;
		default:
		$strform = "j-M-Y g:ia";	
	}
	if ($time == 0 ){	
	$formated_time = date($strform);
	} else {
	$time = strtotime($time);	
	$formated_time  = date($strform, $time);
	}
	return $formated_time;
}

// To Prevent SQL injection
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

function get_domain($url)
{
  $pieces = parse_url($url);
  $domain = isset($pieces['host']) ? $pieces['host'] : '';
  if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
    return $regs['domain'];
  }
  return false;
}


function get_host() {
    if ($host = $_SERVER['HTTP_X_FORWARDED_HOST'])
    {
        $elements = explode(',', $host);
		
        $host = trim(end($elements));
    }
    else
    {
        if (!$host = $_SERVER['HTTP_HOST'])
        {
            if (!$host = $_SERVER['SERVER_NAME'])
            {
                $host = !empty($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : '';
            }
        }
    }
	
    // Remove port number from host
    $host = preg_replace('/:\d+$/', '', $host);
	
    return trim($host);
}
function round2dp($number){
		return number_format((float)$number, 2, '.', ',');
	}
function round0dp($number){
		return number_format((float)$number, 0, '.', ',');
	}
function col_index($string , $line){
	
		$found = 0;
		$i = 0;
		while ($found == 0 && $i < count ($line))
		{
			if ($line[$i] == $string)
			{
					$found = 1;
			}
			else
			{
				$i = $i + 1;
			}
		}
		if ($found ==0) return -1;
		else return $i;
		
	}

function parseTree($root, $arr) {
        $return = array();
        # Traverse the tree and search for direct children of the root
        foreach($arr as $child => $parent) {
            # A direct child is found
            if($parent == $root) {
                # Remove item from tree (we don't need to traverse this again)
                unset($arr[$child]);
                # Append the child into result array and parse it's children
                $return[] = array(
                    'name' => $child,
                    'children' => parseTree($child, $arr)
                );
            }
        }
        return empty($return) ? null : $return;    
    }
    
function printTree($arr) {
        if(!is_null($arr) && count($arr) > 0) {
            echo '<ul>';
            foreach($arr as $node) {
                echo "<li>".  $node['sect_name'] . "";
                if (array_key_exists('children', $node)) {
                    printTree($node['children']);
                }
                echo '</li>';
            }
            echo '</ul>';
        }
    }

function is_serialized( $data ) {
        
        if (!is_string($data)) {
            return false;
        }
        $data = trim( $data );
        if ('N;' == $data) {
            return true;
        }
        if (!preg_match('/^([adObis]):/', $data, $badions)) {
            return false;
        }
        switch ( $badions[1] ) {
            case 'a' :
            case 'O' :
            case 's' :
                if (preg_match("/^{$badions[1]}:[0-9]+:.*[;}]\$/s", $data)) {
                    return true;
                }
                break;
            case 'b' :
            case 'i' :
            case 'd' :
                if (preg_match("/^{$badions[1]}:[0-9.E-]+;\$/", $data)) {
                    return true;
                }
                break;
        }
        return false;
    }
    
    function displayPaginationBelow($per_page,$page,$sql,$page_url){
        DB::query($sql);
        $total = DB::count();
        $adjacents = "2";
        
        $page = ($page == 0 ? 1 : $page);
        $start = ($page - 1) * $per_page;
        
        $prev = $page - 1;
        $next = $page + 1;
        $setLastpage = ceil($total/$per_page);
        $lpm1 = $setLastpage - 1;
        
        $setPaginate = "";
        if($setLastpage > 1)
        {
            $setPaginate .= "<ul class='setPaginate'>";
            $setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";
            if ($setLastpage < 7 + ($adjacents * 2))
            {
                for ($counter = 1; $counter <= $setLastpage; $counter++)
                {
                    if ($counter == $page)
                        $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                        else
                            $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                }
            }
            elseif($setLastpage > 5 + ($adjacents * 2))
            {
                if($page < 1 + ($adjacents * 2))
                {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                    {
                        if ($counter == $page)
                            $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                            else
                                $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                    }
                    $setPaginate.= "<li class='dot'>...</li>";
                    $setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
                    $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";
                }
                elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                {
                    $setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
                    $setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
                    $setPaginate.= "<li class='dot'>...</li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                    {
                        if ($counter == $page)
                            $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                            else
                                $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                    }
                    $setPaginate.= "<li class='dot'>..</li>";
                    $setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
                    $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";
                }
                else
                {
                    $setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
                    $setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
                    $setPaginate.= "<li class='dot'>..</li>";
                    for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++)
                    {
                        if ($counter == $page)
                            $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                            else
                                $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                    }
                }
            }
            
            if ($page < $counter - 1){
                $setPaginate.= "<li><a href='{$page_url}page=$next'>Next</a></li>";
                $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>Last</a></li>";
            }else{
                $setPaginate.= "<li><a class='current_page'>Next</a></li>";
                $setPaginate.= "<li><a class='current_page'>Last</a></li>";
            }
            
            $setPaginate.= "</ul>\n";
        }
        
        
        return $setPaginate;
    }




function make_bitly_url($url,$login,$appkey,$format = 'xml',$version = '2.0.1')
{
    //create the URL
    $bitly = 'http://api.bit.ly/shorten?version='.$version.'&longUrl='.urlencode($url).'&login='.$login.'&apiKey='.$appkey.'&format='.$format;
    
    //get the url
    //could also use cURL here
    $response = file_get_contents($bitly);
    
    //parse depending on desired format
    if(strtolower($format) == 'json')
    {
        $json = @json_decode($response,true);
        return $json['results'][$url]['shortUrl'];
    }
    else //xml
    {
        $xml = simplexml_load_string($response);
        return 'http://bit.ly/'.$xml->results->nodeKeyVal->hash;
    }
}

function get_tick($value){
		if ($value == 1) {
	  	 	$symbol = '<span class="glyphicon glyphicon-ok text-center"></span>';
		} else {
	    	$symbol = '<span class="glyphicon glyphicon-remove"></span>';
		}
	return $symbol;
}


function getAPI( $url, $data){
   $url = sprintf("%s?%s", $url, http_build_query($data));
   echo $url."<br>";
   // EXECUTE:
   $result = file_get_contents($url);
   //print_r(curl_getinfo($curl));
   if(!$result){die("Connection Failure");}
 
   return $result;
}
function callAPI($method, $url, $data){
   $curl = curl_init();
   switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
         break;
      default:
         if ($data) 
            $url = sprintf("%s?%s", $url, http_build_query($data));
   }
   // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);
 	
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0); 
   curl_setopt($curl, CURLOPT_TIMEOUT, 400); //timeout in seconds
   curl_setopt($curl, CURLOPT_ENCODING, '');
   // EXECUTE:
   $result = curl_exec($curl);
   //print_r(curl_getinfo($curl));
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;
}

function truncate($string,$length=100,$append="&hellip;") {
  $string = trim($string);

  if(strlen($string) > $length) {
    $string = wordwrap($string, $length);
    $string = explode("\n", $string, 2);
    $string = $string[0] . $append;
  }

  return $string;
}
function ShowYesNo($pass_value)
{

	if ($pass_value==1)
		return "YES";
	elseif ($pass_value==0)
		return "NO";
	elseif ($pass_value==-1)
		return "UNKNOWN";
}
function ShowTickCross($pass_value)
{

	if ($pass_value==1)
		return " <i class='fa fa-check-square' ></i> ";
	elseif ($pass_value==0)
		return "<i class='fa fa-times-circle' ></i>";
	elseif ($pass_value==-1)
		return "<i class='fa fa-question-circle' ></i>";
}
 