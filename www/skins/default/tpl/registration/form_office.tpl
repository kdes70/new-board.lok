	<div id="container">
		
		<div id="con_wrap">
		<div id="bannerWrep"></div>
		
		
			
             
			
			 
			 
<strong style="color:red"><?php echo getInfo($info); ?></strong>
              <!-- ./skins/tpl/registration/form_office.tpl begin --> 
    <div id="content_wrap" >
            <div id="content_office">                
                <form class="reg_form_block_wrap" action="" method="post" enctype="multipart/form-data"> 
                
                    <h1>Личный кабинет</h1>
                    <strong style="color:red"><?php echo getInfo($info); ?></strong>
                    <div class="form_block_office">
                        <?php echo $avatar; ?>
                        <h3><?php echo htmlChars($_SESSION['userdata']['login']); ?></h3>
                        


                        <div class="clear_right">&nbsp;</div>
                    </div>
                    
                    <div class="form_block_office">
                        <h2>Пароль</h2>
                        <label>Новый пароль</label>
                        <input name="form[value1]" type="password">
                        <label>Повторите пароль</label>
                        <input name="form[value2]" type="password" ><br>
                    </div>                
                
                    <div class="form_block_office">
                        <h2>Контакты</h2>
                        <label>E-mail</label>
                        <input name="form[value3]" type="text" value="<?php echo $email; ?>"/>
                        <label>ICQ</label>
                        <input name="form[value8]" type="text" value="<?php echo $data['icq'];?>" />
                        <label>Skype</label>
                        <input name="form[value9]" type="text" value="<?php echo $data['skype'];?>" />
                        <input class="but" name="edit" type="submit" value="Изменить"/>
                    </div>
                    
                    <div class="form_block_office">
                        <h2>Личные данные</h2>
                        
                        <label>Имя</label>
                        <input name="form[value4]" type="text" value="<?php echo $data['name'];?>"/>
                        
                        <label>Дата рождения</label><br><br>

            <select style="width:50px;" name="form[value5]" >
                <option value="00">День</option>            
                <option value="01" <?php echo returnSelect('01', $data['day'])?>  >1</option>
                <option value="02" <?php echo returnSelect('02', $data['day'])?>  >2</option>
                <option value="03" <?php echo returnSelect('03', $data['day'])?>  >3</option>
                <option value="04" <?php echo returnSelect('04', $data['day'])?>  >4</option>
                <option value="05" <?php echo returnSelect('05', $data['day'])?>  >5</option>
                <option value="06" <?php echo returnSelect('06', $data['day'])?>  >6</option>
                <option value="07" <?php echo returnSelect('07', $data['day'])?>  >7</option>
                <option value="08" <?php echo returnSelect('08', $data['day'])?>  >8</option>
                <option value="09" <?php echo returnSelect('09', $data['day'])?>  >9</option>
                <option value="10" <?php echo returnSelect('10', $data['day'])?>  >10</option>
                <option value="11" <?php echo returnSelect('11', $data['day'])?>  >11</option>
                <option value="12" <?php echo returnSelect('12', $data['day'])?>  >12</option>
                <option value="13" <?php echo returnSelect('13', $data['day'])?>  >13</option>
                <option value="14" <?php echo returnSelect('14', $data['day'])?>  >14</option>
                <option value="15" <?php echo returnSelect('15', $data['day'])?>  >15</option>
                <option value="16" <?php echo returnSelect('16', $data['day'])?>  >16</option>
                <option value="17" <?php echo returnSelect('17', $data['day'])?>  >17</option>
                <option value="18" <?php echo returnSelect('18', $data['day'])?>  >18</option>
                <option value="19" <?php echo returnSelect('19', $data['day'])?>  >19</option>
                <option value="20" <?php echo returnSelect('20', $data['day'])?>  >20</option>
                <option value="21" <?php echo returnSelect('21', $data['day'])?>  >21</option>
                <option value="22" <?php echo returnSelect('22', $data['day'])?>  >22</option>
                <option value="23" <?php echo returnSelect('23', $data['day'])?>  >23</option>
                <option value="24" <?php echo returnSelect('24', $data['day'])?>  >24</option>
                <option value="25" <?php echo returnSelect('25', $data['day'])?>  >25</option>
                <option value="26" <?php echo returnSelect('26', $data['day'])?>  >26</option>
                <option value="27" <?php echo returnSelect('27', $data['day'])?>  >27</option>
                <option value="28" <?php echo returnSelect('28', $data['day'])?>  >28</option>
                <option value="29" <?php echo returnSelect('29', $data['day'])?>  >29</option>
                <option value="30" <?php echo returnSelect('30', $data['day'])?>  >30</option>
                <option value="31" <?php echo returnSelect('31', $data['day'])?>  >31</option>
           </select>
            &nbsp;-&nbsp;
            <select style="width:95px;" name="form[value6]" >
                <option value="00" >Месяц</option>            
                <option value="01" <?php echo returnSelect('01', $data['month'])?> >Января</option>
                <option value="02" <?php echo returnSelect('02', $data['month'])?>  >Февраля</option>
                <option value="03" <?php echo returnSelect('03', $data['month'])?>  >Марта</option>
                <option value="04" <?php echo returnSelect('04', $data['month'])?>  >Апреля</option>
                <option value="05" <?php echo returnSelect('05', $data['month'])?>  >Мая</option>
                <option value="06" <?php echo returnSelect('06', $data['month'])?>  >Июня</option>
                <option value="07" <?php echo returnSelect('07', $data['month'])?>  >Июля</option>
                <option value="08" <?php echo returnSelect('08', $data['month'])?>  >Августа</option>
                <option value="09" <?php echo returnSelect('09', $data['month'])?>  >Сентября</option>
                <option value="10" <?php echo returnSelect('10', $data['month'])?>  >Октября</option>
                <option value="11" <?php echo returnSelect('11', $data['month'])?>  >Ноября</option>
                <option value="12" <?php echo returnSelect('12', $data['month'])?>  >Декабря</option>
            </select>
            &nbsp;-&nbsp;
            <select style="width:55px;" name="form[value7]">
                <option value="0000">Год</option>
                <option value="1980" <?php echo returnSelect('1980', $data['year'])?>>1980</option>
                <option value="1981" <?php echo returnSelect('1981', $data['year'])?> >1981</option>
                <option value="1982" <?php echo returnSelect('1982', $data['year'])?> >1982</option>
                <option value="1983" <?php echo returnSelect('1983', $data['year'])?> >1983</option>
                <option value="1984" <?php echo returnSelect('1984', $data['year'])?> >1984</option>
                <option value="1985" <?php echo returnSelect('1985', $data['year'])?> >1985</option>
                <option value="1986" <?php echo returnSelect('1986', $data['year'])?> >1986</option>
                <option value="1987" <?php echo returnSelect('1987', $data['year'])?> >1987</option>
                <option value="1988" <?php echo returnSelect('1988', $data['year'])?> >1988</option>
                <option value="1989" <?php echo returnSelect('1989', $data['year'])?> >1989</option>
                <option value="1990" <?php echo returnSelect('1990', $data['year'])?> >1990</option>
                <option value="1991" <?php echo returnSelect('1991', $data['year'])?> >1991</option>
                <option value="1992" <?php echo returnSelect('1992', $data['year'])?> >1992</option>
                <option value="1993" <?php echo returnSelect('1993', $data['year'])?> >1993</option>
                <option value="1994" <?php echo returnSelect('1994', $data['year'])?> >1994</option>
                <option value="1995" <?php echo returnSelect('1995', $data['year'])?> >1995</option>
                <option value="1996" <?php echo returnSelect('1996', $data['year'])?> >1996</option>
                <option value="1997" <?php echo returnSelect('1997', $data['year'])?> >1997</option>
                <option value="1998" <?php echo returnSelect('1998', $data['year'])?> >1998</option>
                <option value="1999" <?php echo returnSelect('1999', $data['year'])?> >1999</option>
                <option value="2000" <?php echo returnSelect('2000', $data['year'])?> >2000</option>
            </select><br><br>
                        <label>Загрузить аватар (100х100)</label>
                        <input name="file" type="file" /><br /> 
                        <label>Девиз</label>
                        <input name="form[value10]" size="60" type="text" value="">
                        
                    </div>
                    
                    <input class="but" name="ok" type="submit" value="Отправить">
                    
                </form> 
                
            </div> 
        </div> 
 <!-- ./skins/tpl/registration/form_office.tpl end -->
			
			
			 
<?php  dbg($GET); ?>
<?php  dbg($POST); ?>
						
				<div class="clear"></div>
			</div>
		</div><!-- #container-->

			<?php  include DK_ROOT.'/skins/tpl/left_sitebar.tpl';  ?><!-- #sideLeft -->

	 <?php  include DK_ROOT.'/skins/tpl/right.tpl';  ?>	 

	<!-- #middle-->
