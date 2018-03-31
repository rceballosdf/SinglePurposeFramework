<div class="col-lg-12">
<div class="wrapper wrapper-content">
	<div class="row">
	<?php $this->beginForm('ConfirmDelete','marcas','POST'); ?>
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Confirmación</h5>				
				</div>
				<div class="ibox-content">
					<div class="form-horizontal">
						<h4>¿Confirma que desea eliminar el siguiente registro?</h4>
						<hr />
						<?php 
							// mensaje de error
							?>
						<div class="form-group">
							<?php $this->label('Nombre','Nombre:',"class='control-label col-md-2')"); ?>
							<div class="col-md-10">
                                <?php $this->textbox('Nombre',$this->ViewModel->Nombre,"class = 'form-control' readonly"); ?>
								<?php $this->validationMessage($this->ViewModel->NombreError,'Nombre'); ?>
							</div>
						</div>
						<?php $this->hidden('Id',$this->ViewModel->Id); ?>
						<div class="form-group">
							<div class="col-md-offset-2 col-md-10">
								<input type="submit" value="Borrar" class="btn btn-primary" />
								<?php $this->actionLink('Cancelar','index','marcas',"class='btn btn-default'"); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
