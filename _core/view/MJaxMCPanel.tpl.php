<div class='row MJaxMCPanel_row' style='margin-left:0Px'>
    <!--div class='span1'></div-->
    <?php
    $intIndex = 0;
    foreach($_CONTROL->arrColumns as $strKey => $clmColumn){
        if(count($_CONTROL->arrColumns) - $_CONTROL->intMaxColumns <= $intIndex){ ?>
        <div class='span2 MJaxMCColumn'>
            <div class='MJaxMCColumn_inner'>
                <?php $clmColumn->Render(); ?>
            </div>
        </div>
        <?php }
        $intIndex += 1;
    } ?>
</div>