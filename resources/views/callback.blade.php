<html>
<head>
  <meta charset="utf-8">
  <title>Callback</title>
  <script>
      window.opener.postMessage({ token: "{{ $token }}", user: "{{ $user }}" }, "http://localhost:8000");
      window.close();
  </script>
</head>
<body>
</body>
</html>
