<?php
	$marcas = $this->getTodasLasMarcas();
?>
<div class="col-lg-12">
<div class="wrapper wrapper-content">
	<div class="row">
	<?php $this->beginForm('Save','marcas','POST'); ?>
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Marcas</h5>				
				</div>
				<div class="ibox-content">
					<div class="form-horizontal">
						<h4>Ingrese los datos</h4>
						<hr />
						<?php 
							// mensaje de error
							?>
						<div class="form-group">
							<?php $this->label('Nombre','Nombre:',"class='control-label col-md-2')"); ?>
							<div class="col-md-10">
                                <?php $this->textbox('Nombre',$this->ViewModel->Nombre,"class = 'form-control'"); ?>
								<?php $this->validationMessage($this->ViewModel->NombreError,'Nombre'); ?>
							</div>
						</div>
						<?php $this->hidden('Id',$this->ViewModel->Id); ?>
						<div class="form-group">
							<div class="col-md-offset-2 col-md-10">
								<input type="submit" value="Guardar" class="btn btn-primary" />
								<?php $this->actionLink('Cancelar','index','marcas',"class='btn btn-default'"); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php $this->endForm(); ?>
        <div class="ibox float-e-margins">
		    <div class="col-lg-12 ibox-content">
                <table id="ptable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>
                            Nombre
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($marcas as $item) { ?>
                            <tr>
                                <td>
                                <?php echo $item["Nombre"]; ?>
                                </td>
                                <td>
                                    <?php $this->actionLink("Editar", "Index/".$item['Id'],'marcas')?> |
                                    <?php $this->actionLink("Borrar", "Delete/".$item['Id'],'marcas')?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
             </div>
        </div>
    </div>
</div>