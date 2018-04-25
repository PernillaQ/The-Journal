<?php 

require_once 'partials/head.php';
require_once 'partials/session_start.php';
require_once 'partials/database.php';
require_once 'partials/get_all_entries.php';

?>
<!--Loggar ut användaren efter 15 min ( efter senaste aktivitet)-->
<?php 
if ( isset($_SESSION['LAST_ACTIVITY']) && time() - $_SESSION['LAST_ACTIVITY'] > 900)//15min
{
  session_destroy();
}
$_SESSION['LAST_ACTIVITY'] = time();?>

    <?php if (isset($_SESSION["loggedIn"])): ?>
          <div class="links" id="goBack">
            <a href="partials/logout.php">Sign out</a>
            <a href="#posts">View history</a>
          </div><!--End of link-->
    <?php endif; ?>

<h1>The Journal</h1>

    <?php if (!isset($_SESSION["loggedIn"])): ?>
        <p>Welcome to the Journal, please register and sign in</p>
    <?php else: ?>
       <div class="welcomeUser">
        <p>Welcome to the Journal <?php echo $_SESSION["username"];?>!</p>
    <?php endif; ?>
      

<div class = "form-wrapper">
    <?php  if (!isset($_SESSION["loggedIn"])): ?>

      <div class = "register">
        <h3>Register</h3>
          <form action="partials/register.php" method="POST">
              <label for="name">Username</label>
              <input type="text" name="username" placeholder="Username">
              <label for="password">Password</label>
              <input type="text" name="password" placeholder="Password">
              <input type="submit" value="Register">
          </form>
      </div><!--End of register-->

	    <div class = "signin">
        <h3>Sign in</h3>
          <form action="partials/signin.php" method="POST">
            <label for="name">Username</label>
            <input type="text" name="username" placeholder="Username">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Sign in">
          </form>
      </div><!--End of Sign in-->

  </div><!--En of form-wrapper-->
<?php endif; ?>

<div class="max-width">
  <?php if (isset($_SESSION["loggedIn"])): ?>

      <div class="article-wrapper">
         
          <div class="post-article">
            <h2>Hello</h2>
              <h3>How was your day?</h3>
                <form action="partials/post_entry.php" method="POST">
                  <label for="title">Title</label>
                  <input type="text" name="title" placeholder="Title">
                  <label for="content">Content</label>
                  <textarea type="text" name="content" placeholder="Gather your thoughts..."></textarea>
                  <input type="submit" value="Add">
                </form>
          </div><!--End of post-article-->

        <!--Creates the post-->
            <div class="article-history">

              <h2 id="posts">The Past</h2>
                <?php foreach ($data as $article):?><!--$data from get_all_entries.php-->
                  <div class = "article">
                    <h3>
                      <?=$article["title"]; ?> 
                    </h3>
                    <p>
                      <?=$article["createdAt"]; ?>
                    </p>
                    <p>
                      <?=$article["content"]; ?>
                    </p>
                    <p>
                      <?=$article["entryID"]; ?>
                    </p>
                    <div class="article-links"><!--Sending it to update and delete-->
                      <a href='partials/update.php?ID=<?=$article["entryID"]?>&TITLE=<?=$article["title"]?>&CONTENT=<?=$article["content"]?>'>Update</a>
                      <a href='partials/delete_article.php?ID=<?=$article["entryID"]?>'>Delete</a>
                    </div><!--End of article-links-->

            </div><!--End of article-history-->
          <div class = "divider"></div>
        <?php endforeach;?>
        <div class="goBackLink">
        <a href="#goBack">To the top</a>
        </div>
      </div><!--End of article-wrapper-->
  </div><!--End of max-width-->
  <?php endif; ?><!--(logged in)-->

<?php require 'partials/footer.php';?>
</body>
</html>