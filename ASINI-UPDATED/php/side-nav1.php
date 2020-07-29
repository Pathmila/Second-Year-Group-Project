<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 250px;
  background-color: black;
  opacity:0.7;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color:white;
  padding: 10px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>
<body>

<div class="sidebar">
  <a href="admin_addcategory_page">Add Category</a>
  <a href="admin_addsubcategory_page">Add Subcategory</a>
  <a href="admin_addtravelpackage_page">Add Travel Packages</a>
  <a href="admin_adddestination_page">Add Destinations</a>
  <a href="admin_updatecategory_page1">Update Category</a>
  <a href="admin_updatesubcategory_page1">Update Subcategory</a>
  <a href="admin_updatetravelpackage_page1">Update Travel Packages</a>
  <a href="admin_deletecategory_page1">Delete Category</a>
  <a href="admin_deletesubcategory_page1">Delete Subcategory</a>
  <a href="admin_deletetravelpackage_page1">Delete Travel Packages</a>
  <a href="#">View Bookings</a>
  <a href="#">View Accounts</a>
  <a href="#">View Reports</a>
</div>



</body>
</html>
