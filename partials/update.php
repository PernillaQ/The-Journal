<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <title>Journal</title>
</head>

<body>
<?php  
/*require_once 'head.php';*/
require_once 'session_start.php';
require_once 'database.php';
require_once 'get_all_entries.php';


if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
/*Sent with updatelink from index.php*/
if (isset($_GET["ID"])&isset($_GET["TITLE"])&isset($_GET["CONTENT"])){
  $id = $_GET["ID"];
  $title = $_GET["TITLE"];
  $content = $_GET["CONTENT"];
}
 ?>
 <h1>The Journal</h1>
 <!--Welcome the current user by username-->
    <?php if (isset($_SESSION["loggedIn"])): ?>
        <p>Welcome to updates <?php echo $_SESSION["username"];?>!</p>
    <?php endif; ?>


  <div class = "form-wrapper">
    <div class="post-article">
       <h2>Hello</h2>
         <h3>So you had a change of heart?</h3>
            <form action="update_article.php?ID=<?=$id?>" method="POST"> <!--Adds the id and sent it to update_article.php-->
            <label for="title">Title</label>
            <input type="text" name="title" value="<?=$title;?>"><!--Adds content the old content to updateinput-->
            <label for="content">Content</label>
            <textarea type="text" name="content"><?=$content;?></textarea><!--Adds the old content to updatetextbox-->
            <input type="submit"  name="update" value="Update">
        </form>
         <a href="/index.php">Go back</a><!--Go back to index.php without updating -->
    </div><!--End of post-article-->
  </div><!--form-wrapper-->

</body>

<?php require_once 'footer.php'; ?>


