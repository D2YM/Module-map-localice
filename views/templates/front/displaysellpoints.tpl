{extends file='page.tpl'}
{block name="content"}

<div id="product">
<div id="box-map" class="container p-0">
    <input type="hidden" id="moduleURL" value="{$my_module_link}">

    <div class="row">
        <div class="col-xs-12 module-title">
            <h4 class="title_block">{l s='Sell Points' mod='maplocalice'}</h4>
        </div><!-- /.col-xs-12 -->
    </div><!-- /.row -->
    <div class="row info-map">
        <div class="col-sm-4">
            <aside>
			    <div class="parrafo">
					<h4><span>{$TITLE_LEFT_SP}</span></h4>
					<div>{$CONTENT_LEFT_SP|unescape: "html" nofilter}</div>
				</div>                
                <select id="jsMap" class="js-example-basic-single" name="state">
                    {foreach from=$CITYS item=CITY}
                        <option value="{$CITY['city']}">{$CITY['city']}</option>
                    {/foreach}
                </select>
                
                <div id="result" class="results">
					<div class="margin-d">
						<span class="titlep">{l s='Results' mod='maplocalice'}</span><br>
					</div>
					<div id="result-data">
    				</div><!-- /#result-data -->
				</div><!-- /.results-->
            </aside><!-- /aside -->
        </div><!-- /.col-sm-4-->
        <div class="col-sm-8">
            <div id="map-api"></div>
            <div class="parrafo2">
					<div class="title-p2-box">
						<span class="title-p2">{$TITLE_RIGHT_SP}</span>
					</div>
					<div>{$CONTENT_RIGHT_SP|unescape: "html" nofilter}</div>
				</div>
        </div><!-- /.col-sm-8-->
    </div><!-- /.row -->
</div><!-- /.container -->
{*<pre>{$LAT_LON|@var_dump}</pre>*}
</div>
  
{/block}