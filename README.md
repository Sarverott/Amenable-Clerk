<h1 style="font-size:72px;text-align:center">clerkPHP v1.0.0</h1>
bot to make custom http requests and database queries, using external client or prepared manualy url (no interface)
<div style="margin:50px">
<h1>usage</h1>
<p>host.srv/?key=qwerty123456&command={JSONdata}</p>
<p style="word-wrap: break-word;">up.loc/?key=qwerty123456&dbact=%7B%22host%22%3A%22host.address%22%2C%22database%22%3A%22superDB%22%2C%22user%22%3A%22root%22%2C%22password%22%3A%22toor%22%2C%22queries%22%3A%5B%22SELECT+1%22%2C%22INSERT+INTO+table+%28field%29+VALUES+%28%22values%22%29%22%5D%7D</p>
<h3>command list</h3>
<ul>
  <li><b>proxy</b></li>
  <li><b>dbact</b></li>
  <li><b>config</b> (in plans)</li>
</ul>
  <h1> Examples of usage</h1>

<h3>proxy</h3>
'JSONdata' key content:
<pre>
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
</pre>
<h3>dbact</h3>
'JSONdata' key content:
<pre>
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
</pre>
