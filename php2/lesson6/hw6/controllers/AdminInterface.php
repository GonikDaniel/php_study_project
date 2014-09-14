<?php
interface AdminInterface
{
	public function action($action);

	public function EditShowAction($id);
	public function EditAction($id);
	public function DeleteAction();
}