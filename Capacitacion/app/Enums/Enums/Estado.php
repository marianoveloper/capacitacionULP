<?php

namespace App\Enums\Enums;

enum Estado:string
{
  case Activo='activo';
  case Pendiente='pendiente';
  case Baja='baja';
}
