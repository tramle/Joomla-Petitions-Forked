<?php defined('_JEXEC') or die('Restricted access'); ?>
<script type="text/javascript">
	function formaffiche(){
		document.getElementById("formsign").style.display = "block";
		document.getElementById("cache").style.display = "inline";
		document.getElementById("voir").style.display = "none";
	}
	function formcache(){
		document.getElementById("formsign").style.display = "none";
		document.getElementById("cache").style.display = "none";
		document.getElementById("voir").style.display = "inline";
	}
</script>
<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
	<div class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
		<?php echo $this->category->title; ?>
	</div>
	<div class="small com_petitions_signeecount">
			(<?php echo $this->total;?> <?php echo JText::_('petitions number of signees')?>)
	</div>
<?php endif; ?>

<?php if ( @$this->category->image || @$this->category->description ) : ?>
	<div class="petition_info contentdescription<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
		<?php
			if ( isset($this->category->image) ) :
				echo $this->category->image;
			endif;
		?>
		<div class="petition_info_description">
			<?php echo $this->category->description; ?>
		</div>
	</div>
<?php endif; ?>
<table width="100%" cellpadding="4" cellspacing="0" border="0" align="center" class="contentpane<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
	<tr class="petition_signees">
		<td width="60%" colspan="2">
			<?php if (!$this->params->get('signataires_masque', 0)) : ?>
				<?php echo $this->loadTemplate('items'); ?>
			<?php endif; ?>
		</td>
	</tr>
	<?php if ($this->params->get('form_affmas',0)) : ?>
		<tr id="voir" style="display:inline;">
			<td align="center">
				<h1>
					<a href="javascript:formaffiche()">
						<?php echo JText::_( 'SIGN PETITION', true ); ?>
					</a>
				</h1>
			</td>
		</tr>
		<tr id="cache" style="display:none;">
			<td align="center">
				<a href="javascript:formcache()">
					<?php echo JText::_( 'Masquer le formulaire', true ); ?>
				</a>
			</td>
		</tr>
	<?php endif; ?>
	<tr<?php echo ($this->params->get('form_affmas',0))?' id="formsign" style="display:none;"':''; ?>>
		<td width="60%" colspan="2">
			<?php if (!$this->params->get('form_masque',0)) : ?>
				<?php echo $this->loadTemplate('form'); ?>
			<?php endif; ?>
		</td>
	</tr>
</table>