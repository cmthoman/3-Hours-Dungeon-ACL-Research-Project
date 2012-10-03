Hey <?php echo $this->data['User']['username']?>,

Congrats on creating your account with 3 Hours Dungeon. To begin using your account you must activate it by following the link provided in this email.
If you have any questions or problems please contact us at support@3hoursdungeon.com. We hope you enjoy the site!

-Team 3HD

Activation Link: <?php echo 'http://beta.3hd.aswanmedia.com/users/activateAccount?activate=attempt&username='.$this->data['User']['username'].'&key='.$this->request->data['User']['hash']; ?>

