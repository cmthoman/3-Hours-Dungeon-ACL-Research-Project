<div class="pageBackgroundAtlantis">
	<?php if($activate == 'pending'): ?>
	<div class="wrapper600px alignCentered clearfix">
		<div class="clearfix" style="margin-bottom: 60px;">
			<h3>Account Activation Pending</h3>
		</div>
	</div>
	<div class="wrapper600px alignCentered clearfix bgBlackOpaque borderRadius8px padding10px">
		<div class="clearfix" style="margin-left: 27px;">
			<p>Hey <?php echo $username; ?>,</p><br/>
			<p>Congrats on creating your account! You're almost done... Now all that's left to do is head over to your email and follow the activatvation link within!</p><br/>
			<p>If you just regested but haven't received your activation email, please give it a minute or two. Othewise click here to have it re-sent!</p><br/>
			<p>If you no longer have access to the email address <?php echo $email; ?> or this is not your email address (derp), please contact us at Support@3HoursDungeon.com so that we can help you activate your account.</p><br/>
			<p>-Team 3HD</p><br/>
		</div>
	</div>
	<?php elseif($activate == 'complete'): ?>
		<div class="wrapper600px alignCentered clearfix">
		<div class="clearfix" style="margin-bottom: 60px;">
			<h3>Account Activation Complete</h3>
		</div>
	</div>
	<div class="wrapper600px alignCentered clearfix bgBlackOpaque borderRadius8px padding10px">
		<div class="clearfix" style="margin-left: 27px;">
			<p>Hey <?php echo $username; ?>,</p><br/>
			<p>Congrats on activating your account! You can now log in, Sweet!</p><br/>
			<p>Make sure to check out the forum for the latest discussions, the landing page for the latest articles, and of course the streams page for 3HD community streams! Also, don't forget 3HD has more than one portal. 
				Click the portal dropdown in the user control panel at the top of the page to explore the rest of the 3HD community.</p><br/>
			<p>Most importantly, have fun! We'll see you online and in-game ;)</p><br/>
			<p>-Team 3HD</p><br/>
		</div>
	</div>
	<?php endif; ?>
</div>