<?php
interface AdminInterface
{
	public function action($action);

	public function EditShowAction($id);
	public function EditAction();
	public function DeleteAction();
}