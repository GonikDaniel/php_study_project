<?php
interface AdminInterface
{
	public function action($action);

	public function EditShowAction();
	public function EditAction($id, $title, $content);
	public function DeleteAction();
}