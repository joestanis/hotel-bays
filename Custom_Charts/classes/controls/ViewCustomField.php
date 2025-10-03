<?php
class ViewCustomField extends ViewControl
{
	public function showDBValue(&$data, $keylink)
	{
		return CustomExpression($data[$this->field], $data, $this->field, $this->container->pageType, "");
	}
}
?>