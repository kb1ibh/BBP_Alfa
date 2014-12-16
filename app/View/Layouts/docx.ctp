<?php
header("Content-type: application/vnd.ms-word");
if($this->request->params['action'] == "invoice") {
	header("Content-Disposition: attachment; Filename=Invoice-".$order['Order']['po_number'].".doc");
} elseif($this->request->params['action'] == "packing") {
	header("Content-Disposition: attachment; Filename=Packing-".$order['Order']['po_number'].".doc");
}

echo $this->fetch('content');