<?php
// if input
if ( isset( $_POST['wpnewsgen_admin_action'] ) && wp_verify_nonce( $_POST['wpnewsgen_admin_action'], 'wpnewsgen_admin_action' ) ) {
    if (FALSE === get_option('wpnewsgen') && FALSE === update_option('wpnewsgen',FALSE)) add_option('wpnewsgen',$_POST['wpnewsgen']);
}
//get data from option [wpnewsgen]
$dataoption = get_option('wpnewsgen');
$apikey     = isset($dataoption['apikey'])?$dataoption['apikey']:'';
?>

<div class="wrap">
    <h2>WP News Generator Settings</h2>

    <form action="" method="post">
        <?php wp_nonce_field( 'wpnewsgen_admin_action', 'wpnewsgen_admin_action' ); ?>
        <table class="form-table" role="presentation">
            <tbody>
                <tr>
                    <th>API KEY newsapi.org</th>
                    <td>
                        <input type="text" value="<?php echo $apikey;?>" name="wpnewsgen[apikey]" id="apikey" class="regular-text">
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" value="Save Changes" id="submit" class="button button-primary">
        </p>
    </form>

</div>