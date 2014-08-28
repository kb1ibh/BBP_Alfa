<div style="text-align:center;">
	<ul class="pagination">
		<?php
		//Prev
		echo $this->Paginator->prev(
			__('<< Prev'), 
			array(
				'tag' => 'li'
			), 
			null, 
			array(
				'tag' => 'li',
				'class' => 'disabled',
				'disabledTag' => 'a'
			)
		);
		
		//Numbered Pages
		echo $this->Paginator->numbers(
			array(
				'separator' => '',
				'currentTag' => 'a', 
				'currentClass' => 'active',
				'tag' => 'li',
				'first' => 1
			)
		);
		
		//Next
		echo $this->Paginator->next(
			__('Next >>'), 
			array(
				'tag' => 'li',
				'currentClass' => 'disabled'
			), 
			null, 
			array(
				'tag' => 'li',
				'class' => 'disabled',
				'disabledTag' => 'a'
			)
		);
		?>
	</ul>
</div>