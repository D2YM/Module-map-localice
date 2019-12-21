<div id="config_map" class="map">
    <form method="POST">
        <div class="panel">
            <div class="panel-heading">
                {l s='Configuration' mod='maplocalice'}
            </div>
            <div class="panel-body">
                <div class="container w-100">
                    <div class="row flex-wrap">                
                        <div class="panel col-lg-12">
                            <div class="panel-heading">
                                {l s='API KEY' mod='maplocalice'}
                            </div>
                            <div class="panel-body">
                                <div class="container w-100">
                                    <div class="row flex-wrap">
                                        <div class="form-group col-lg-12">
                                            <label for="api_key">Api Key: </label>
                                            <input type="text" id="api_key" name="api_key" class="col form-control" value="{$API_KEY}" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel col-lg-12">
                            <div class="panel-heading">
                                {l s='Technical Server' mod='maplocalice'}
                            </div>
                            <div class="panel col-lg-12">
                                <div class="panel-heading">
                                    {l s='Column left' mod='maplocalice'}
                                </div>
                                <div class="panel-body">
                                    <div class="container w-100">
                                        <div class="row flex-wrap">
                                            <div class="form-group col-lg-6">
                                                <label for="title_left_ts" class="col-lg-6">Titulo Columna Izquierda: </label>
                                                <input type="text" id="title_left_ts" class="col-lg-6 form-control" name="title_content_left_ts" value="{$TITLE_LEFT_TS}">
                                            </div>
                                            <div class="form-group col-lg-6 d-flex flex-column">
                                                <label for="paragraph_left_ts" class="col-lg-6">Parrafo Columna Izquierda: </label>
                                                <textarea class="col-lg-6 form-control" id="paragraph_left_ts" rows="6" name="text_content_left_ts" >{$CONTENT_LEFT_TS}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel col-lg-12">
                                <div class="panel-heading">
                                    {l s='Column right' mod='maplocalice'}
                                </div>
                                <div class="panel-body">
                                    <div class="container w-100">
                                        <div class="row flex-wrap">
                                            <div class="form-group col-lg-6">
                                                <label for="title_right_ts" class="col-lg-6">Titulo Columna Derecha: </label>
                                                <input type="text" id="title_right_ts" class="col-lg-6 form-control" name="title_content_right_ts" value="{$TITLE_RIGHT_TS}">
                                            </div>
                                            <div class="form-group col-lg-6 d-flex flex-column">
                                                <label for="paragraph_right_ts" class="col-lg-6">Parrafo Columna Derecha: </label>
                                                <textarea class="col-lg-6 form-control" id="paragraph_right_ts" rows="6" name="text_content_right_ts" >{$CONTENT_RIGHT_TS}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel col-lg-12">
                            <div class="panel-heading">
                                {l s='Sell Points' mod='maplocalice'}
                            </div>
                            <div class="panel col-lg-12">
                                <div class="panel-heading">
                                    {l s='Column left' mod='maplocalice'}
                                </div>
                                <div class="panel-body">
                                    <div class="container w-100">
                                        <div class="row flex-wrap">
                                            <div class="form-group col-lg-6">
                                                <label for="title_left_sp" class="col-lg-6">Titulo Columna Izquierda: </label>
                                                <input type="text" id="title_left_sp" class="col-lg-6 form-control" name="title_content_left_sp" value="{$TITLE_LEFT_SP}">
                                            </div>
                                            <div class="form-group col-lg-6 d-flex flex-column">
                                                <label for="paragraph_left_sp" class="col-lg-6">Parrafo Columna Izquierda: </label>
                                                <textarea class="col-lg-6 form-control" id="paragraph_left_sp" rows="6" name="text_content_left_sp" >{$CONTENT_LEFT_SP}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel col-lg-12">
                                <div class="panel-heading">
                                    {l s='Column right' mod='maplocalice'}
                                </div>
                                <div class="panel-body">
                                    <div class="container w-100">
                                        <div class="row flex-wrap">
                                            <div class="form-group col-lg-6">
                                                <label for="title_right_sp" class="col-lg-6">Titulo Columna Derecha: </label>
                                                <input type="text" id="title_right_sp" class="col-lg-6 form-control" name="title_content_right_sp" value="{$TITLE_RIGHT_SP}">
                                            </div>
                                            <div class="form-group col-lg-6 d-flex flex-column">
                                                <label for="paragraph_right_sp" class="col-lg-6">Parrafo Columna Derecha: </label>
                                                <textarea class="col-lg-6 form-control" id="paragraph_right_sp" rows="6" name="text_content_right_sp" >{$CONTENT_RIGHT_SP}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button type="submit" name="post-config" class="btn btn-default pull-right">
                    <i class="process-icon-save"></i>
                    {l s='Save' mod='maplocalice'}
                </button>
            </div>
        </div>
    </form>
</div>