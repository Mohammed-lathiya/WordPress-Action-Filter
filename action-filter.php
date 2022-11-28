<?php

/* action */
class emailer {
	function send($post_ID)  {
    	$friends = 'ToT@example.org,alles@example.org';
    	mail($friends,"sally's blog updated",'I just put something on my blog: http://blog.example.com');
    	return $post_ID;
  	}
}
$myEmailClass = new emailer();
add_action('publish_post', array($myEmailClass, 'send'));
add_action('publish_post', array('emailer', 'send'));
add_action ( 'hook_name', 'your_function_name', [priority], [accepted_args] );

do_action ( '__after_header' )


/* Filter */
function filter_profanity( $content ) {
	$profanities = array('badword','alsobad','...');
	$content = str_ireplace( $profanities, '{censored}', $content );
	return $content;
}
add_filter ( 'hook_name', 'your_filter', [priority], [accepted_args] );



add_filter( 'jacks_boast' , 'cut_the_boasting');
function cut_the_boasting($boast) {
  // Replace "best" with "second-best"
  $boast = str_replace ( "best" , "second-best" , $boast );
  // Append another phrase at the end of his boast
  $boast = $boast . ' However, Gill can outshine me any day.';
  return $boast;
}
echo apply_filters('jacks_boast', "I'm the best in the world.");

?>
