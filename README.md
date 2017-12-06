# clerkPHP
bot to make custom http requests and database queries, using external client or prepared manualy url (no interface)
<h1 style="font-size:72px;text-align:center">Amenable Clerk v<?php echo $ver; ?></h1>
<div style="margin:50px">
<h1>usage</h1>
<p>host.srv/?key=qwerty123456&command={"JSON":"data"}</p>
<p style="word-wrap: break-word;"><?php echo $_SERVER['SERVER_NAME'].'/?'.urlencode($main_key['alias']).'='.urlencode($main_key['content']).'&'.urlencode($key['dbact']).'='.urlencode('{"host":"host.address","database":"superDB","user":"root","password":"toor","queries":["SELECT 1","INSERT INTO table (field) VALUES ("values")"]}'); ?></p>
<h3>command list</h3>
<ul>
  <li><b>proxy</b> - <?php echo $key['proxy']; ?></li>
  <li><b>dbact</b> - <?php echo $key['dbact']; ?></li>
  <li><b>config</b> (in plans) - <?php echo $key['config']; ?></li>
</ul>
# Examples of usage

# proxy
{
  "url":"host.address",
  "path":"/foo/bar/",
  "get":{
    "key1":"val1",
    "key2":"val2",
    "key3":"val3",
    "key4":"val4"
  },
  "post":{
    "key1":"val1",
    "key2":"val2",
    "key3":"val3",
    "key4":"val4"
  },
  "referer":"previous.host",
  "header":[
    "title: content",
    "lorem impus",
    "you are calling",
    "Connection:keep-alive"
  ],
  "host":"localhost.inheader",
  "autherization":"<b>## BasicAuth ##</b>",
  "cookie":{
    "key1":"val1",
    "key2":"val2",
    "key3":"val3",
    "key4":"val4"
  },
  "user-agent":"Browser Name OR notBrowser Name",
  "head-only":false,
  "follow":false,
  "ssl":false
}
# dbact
{
  "host":"host.address",
  "database":"superDB",
  "user":"root",
  "password":"toor",
  "queries":[
    "SELECT 1",
    "INSERT INTO table (field) VALUES ('values')"
  ]
}
