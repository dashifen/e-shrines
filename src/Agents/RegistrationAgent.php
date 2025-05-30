<?php

namespace Dashifen\WordPress\Plugins\eShrines\Agents;

use Dashifen\WPHandler\Handlers\HandlerException;
use Dashifen\WPHandler\Agents\AbstractPluginAgent;
use Dashifen\WPHandler\Traits\PostTypeRegistrationTrait;

class RegistrationAgent extends AbstractPluginAgent
{
  use PostTypeRegistrationTrait;
  
  /**
   * Uses addAction and/or addFilter to attach protected methods of this object
   * to the ecosystem of WordPress action and filter hooks.
   *
   * @return void
   * @throws HandlerException
   */
  public function initialize(): void
  {
    $this->addAction('init', 'registerPostType');
  }
  
  /**
   * Registers the Shrine custom post type.
   *
   * @return void
   */
  protected function registerPostType(): void
  {
    register_post_type('shrine', [
      'menu_icon'           => 'dashicons-buddicons-friends',
      'labels'              => $this->getPostTypeLabels('Shrine', 'Shrines', 'dash-e-shrines'),
      'supports'            => ['title', 'editor'],
      'capability_type'     => 'post',
      'menu_position'       => 21,
      'hierarchical'        => false,
      'public'              => true,
      'can_export'          => true,
      'has_archive'         => true,
    ]);
  }
  
  /**
   * Returns an encoded SVG icon.
   *
   * @return string
   */
  private function getIcon(): string
  {
    $icon = <<< SVG
      <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
        <g>
          <path d="M194.5184,211.2472H150.6262a21.9294,21.9294,0,0,0-21.9289,21.9289v217.147a12.99,12.99,0,0,0,12.9868,12.9911h61.7764a12.99,12.99,0,0,0,12.9868-12.9911V233.1761A21.9322,21.9322,0,0,0,194.5184,211.2472Z"/><path d="M361.3719,307.7722H317.48a21.9322,21.9322,0,0,0-21.929,21.9289V450.1645a13.15,13.15,0,0,0,13.15,13.15h61.455a13.1457,13.1457,0,0,0,13.1453-13.15V329.7011A21.9293,21.9293,0,0,0,361.3719,307.7722Z"/><path d="M183.9652,55.2638a13.1551,13.1551,0,0,0-22.7858,0l-30.404,52.6629c-16.2646,28.1717-.4842,62.509,28.6344,70.6156V138.6392a13.1625,13.1625,0,1,1,26.325,0v39.9031c29.1186-8.1066,44.899-42.4439,28.6344-70.6156Z"/><path d="M326.2633,275.0673V235.1642a13.1625,13.1625,0,0,1,26.325,0v39.9031c29.1186-8.1066,44.9034-42.4439,28.6345-70.6156l-30.404-52.6629a13.1551,13.1551,0,0,0-22.7859,0l-30.4,52.6629C281.3643,232.6234,297.1447,266.9564,326.2633,275.0673Z"/>
        </g>
      </svg>
    SVG;
    
    return 'data:image/svg+xml;base64,' . base64_encode($icon);
  }
}
