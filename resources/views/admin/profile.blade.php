<!DOCTYPE html>
 
<html>
 
<head>
 
<title>Profile</title>
 
<link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
 
</head>
 
<body>
 
<div class="container">
 
<table class="table">
 
  <tr class="th">
 
      <th>Name</th>
 
      <th>Email</th>
 
      <th>Action</th>
 
      
 
  </tr>
 
  <tr>
 
      <td>{{ $LoggerUserInfo->name }}</td>
 
      <td>{{ $LoggerUserInfo->email }}</td>
 
      <td><a href="logout">Logout</a></td>
 
      
 
  </tr>
 
  
 
</table>
 
</div>
 
 
 
 
</body>
 
</html>