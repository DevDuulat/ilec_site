<?php
  namespace App\Enums;
  enum StudyMode: string
  {
      case FULL_TIME = 'Очное';
      case ONLINE = 'Онлайн';
      case HYBRID = 'Смешанное';
  }
