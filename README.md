 firstly 
  i ahve installed laravel project using  this "composer create-project laravel-laravel project name" .
  make register form and login using registered credentials .
  make condition like 
        . If user is already logged in from another device
              .Store new session ID in session data
              .Logout the current session and redirect to a decision page
  
        Update the session ID for the user

        
  make device condition (chose confim session device)
        .  Logout old session when click on new session 
        . Update the user's session ID to the new one
        . Log in the user with the new session
        . Keep the old session, so log out the new session when click on old session