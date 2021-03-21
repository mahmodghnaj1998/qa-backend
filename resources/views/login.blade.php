<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
   <h1> plase whit....... </h1> 
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
<script>
    var app = <?php echo json_encode($token); ?>;
    Cookies.set('token', app,{ domain:'questionandanswer.vercel.app' })
  //  window.location = ('https://questionandanswer.vercel.app') 
 
</script>