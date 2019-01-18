<div class="wrapper">
        <div class="com-form-wrapper col-md-6">
            <div class="com-form">
                <form method="post">
                <div>
                        <span class="help">
                        <input  class="com-form-textinput" 
                                id="firstname" 
                                type="text" 
                                name="firstname" 
                                maxlength="30" 
                                placeholder="Имя" 
                                autocomplete="off" 
                                required autofocus>
                        </span>
                        <span class="help">
                        <input  class="com-form-textinput" 
                                id="surname" 
                                type="text" 
                                name="surname" 
                                maxlength="30" 
                                placeholder="Фамилия" 
                                autocomplete="off" 
                                required>
                        </span>
                        <span class="help">
                        <input  class="com-form-textinput" 
                                id="lastname" 
                                type="text" 
                                name="lastname" 
                                maxlength="30" 
                                placeholder="Отчество" 
                                autocomplete="off" 
                                required>
                        </span>
                        <span class="help">
                        <input  class="com-form-textinput" 
                                id="mail" 
                                type="email"
                                pattern="([^.]+[A-Za-z0-9._%+-])*[^.]@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$"
                                name="mail" 
                                maxlength="30" 
                                placeholder="E-mail" 
                                autocomplete="off" 
                                required>
                        </span>
                
                    </div>
                    <textarea   class="com-form-commentinput" 
                                id="coment" 
                                name="coment" 
                                placeholder="Отправить вброс" 
                                maxlength="200" 
                                required></textarea>
                    
                    <input  class="com-form-submit" 
                            type="submit"
                            value="Отправить">  
                </form>
                    
            </div>
        </div>


        <?php
        //input type submit заменить на input type button

        /// COMMENT MANAGER
        function renderComment($name,$surname,$lastname,$date,$comment) {
          ?>
          <li>
              <div class="comment">
                  <div class="self-photo">
                      <a href="#" class="self-link">
                          <img src="assets/nav_self_1366117.png" alt="">
                      </a>
                  </div>
                  <div class="main-comment">
                      <p class="self-info">
                            <?php
                                echo $surname . ' ' . $name . ' ' . $lastname;
                            ?>
                      </p>
                      <p class="self-comment">
                            <?php
                                echo $comment;
                            ?>
                      </p>
                      <p class="self-comment-time">
                            <?php
                                echo $date;
                            ?>
                      </p>
                  </div>
              </div>
          </li>
          
          <?php?><?
        }

        ?>
        
        <div class="col-md-6">
            <div class="com-list">
                <ul>
                    <?php
                        foreach ($vars as $key => $value) {
                            renderComment(
                                $value["firstname"],
                                $value["surname"],
                                $value["lastname"],
                                $value["dt"],
                                $value["com_text"]
                            );
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>