<?php
interface AdminInterface
{
	public function action($action);

	public function EditShowAction();
	public function EditAction();
	public function DeleteAction();
}