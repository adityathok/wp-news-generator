<?php
//get data from option [wpnewsgen]
$dataoption = get_option('wpnewsgen');
$apikey     = isset($dataoption['apikey'])?$dataoption['apikey']:'';
?>

<div class="wrap">
    <h2>WP News Generator</h2>

    <div class="wpnewsgen-config-js">
        <input type="hidden" name="apikey" value="<?php echo $apikey;?>">
    </div>

    <div class="wpnewsgen-main">
        <div class="wpnewsgen-loadnews-main">
            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th>API KEY newsapi.org</th>
                        <td>
                            <input type="text" value="<?php echo $apikey;?>" name="apikey" id="apikey" class="regular-text">
                        </td>
                    </tr>
                    <tr>
                        <th>Code Country</th>
                        <td>
                            <input type="text" value="id" name="country" id="country" class="regular-text">
                        </td>
                    </tr>
                </tbody>
            </table>
            <br><br>
            <div class="button button-primary wpnewsgen-run">Load News</div>
        </div>
        <div class="wpnewsgen-resultnews-main">
        </div>
    </div>

</div>