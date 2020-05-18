<?php
namespace TMC_Elementor_Widgets;

use Elementor\Controls_Manager;
use Elementor\Icons_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;

class Stake_Tutorial extends Widget_Base{
    public function get_name()
    {
      return 'tmc-stake-tutorial';
    }
    public function get_icon()
    {
        return 'eicon-alert';
    }
    public function get_title()
    {
        return esc_html__('Stake Turotial', 'tmc');
    }

    public function get_categories()
    {
        return [ 'tmc-introduce-widgets' ];
    }
    protected function _register_controls()
    {
      // Tab Content
      $this->tmc_stake_option();      
    }
    private function tmc_stake_option(){
      $this->start_controls_section(
        'tmc_stake_tutotial',
        [
            'label' => esc_html__('General', 'tmc')
        ]
      );
      $this->add_control(
        'step',
        [
          'type'        => Controls_Manager::TEXT,
          'label'       => __('Step', 'tmc' ),
          'default'     => __( '1', 'tmc' ),
          'placeholder' => __( 'Type your text', 'tmc' ),
        ]
      );
      $this->add_control(
        'title',
        [
          'type'        => Controls_Manager::TEXT,
          'label'       => __('Heading', 'tmc' ),
          'default'     => __( 'Tutorial', 'tmc' ),
          'placeholder' => __( 'Type your text', 'tmc' ),
        ]
      );

      $repeater = new Repeater();

      $repeater->add_control(
        'icon',
        [
          'label' => __( 'Icon', 'tmc' ),
          'type' => Controls_Manager::ICONS,
          'default' => [
            'value' => 'fas fa-star',
            'library' => 'solid',
          ],
        ]
      );
      $repeater->add_control(
        'url',
        [
          'label'         => __( 'Url', 'tmc' ),
          'type'          => Controls_Manager::URL,
          'placeholder'   => __( 'https://your-link.com', 'tmc' ),
          'show_external' => true,
          'default'       => [
            'url'         => '',
            'is_external' => true,
            'nofollow'    => true,
          ],
        ]
      );
      $repeater->add_control(
        's_desc',
        [
          'type'        => Controls_Manager::TEXTAREA,
          'rows'        => 5,
          'label'       => esc_html__( 'Description', 'tmc' ),
          'description' => esc_html__('Type your description','tmc')
        ]
      );

      $this->add_control(
        'wallet_list',
        [
          'label' => __( 'Wallet', 'tmc' ),
          'type' => Controls_Manager::REPEATER,
          'fields' => $repeater->get_controls(),
          'default' => [
            [
              's_desc' => __( 'TomoWallet', 'tmc' ),
            ],
            [
              's_desc' => __( 'TrustWallet', 'tmc' ),
            ],
            [
              's_desc' => __( 'Ledger Nano', 'tmc' ),
            ],
          ],
          'title_field' => '{{{ s_desc }}}',
        ]
      );
      // Columns.
      $this->add_responsive_control(
        'columns',
        [
          'type'           => Controls_Manager::SELECT,
          'label'          => '<i class="fa fa-columns"></i> ' . esc_html__( 'Columns', 'tmc' ),
          'default'        => 2,
          'tablet_default' => 2,
          'mobile_default' => 1,
          'options'        => [
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
          ]
        ]
      );
      $this->add_control(
        'html',
        [
          'label'       => __( 'Add HTML', 'tmc' ),
          'type'        => Controls_Manager::CODE,
          'language'    => 'html',
          'rows'        => 10,
        ]
      );
      
      $this->end_controls_section();

    }
    protected function render()
    {
      $settings = $this->get_settings();
      ?>
      <div class="tmc-stake-turotial-widget">
          <div class="tx-heading tx-accordion">
            <?php if(!empty($settings['step'])):?>
              <span class="tx-step"><?php echo wp_kses_post($settings['step']);?></span>
            <?php endif;?>
            <?php if(!empty($settings['title'])):?>
              <h3 class="tx-title"><?php echo wp_kses_post($settings['title']);?></h3>
              <span class=tx-icon><i class="fas fa-caret-down"></i></span>
            <?php endif;?>
          </div>
          
          <div class="tx-stake-tutorial-desc tx-accordion-content">
              <?php
              $wallet_list = $settings['wallet_list'];

              $mobile_class = ( ! empty( $settings['columns_mobile'] ) ? ' tmc-mobile-' . $settings['columns_mobile'] : '' );
              $tablet_class = ( ! empty( $settings['columns_tablet'] ) ? ' tmc-tablet-' . $settings['columns_tablet'] : '' );
              $desktop_class = ( ! empty( $settings['columns'] ) ? ' tmc-desktop-' . $settings['columns'] : '' );
              $item_class = ' tmc-grid-col'.$desktop_class . $tablet_class . $mobile_class;
              ?>
              <div class="<?php echo esc_attr($item_class);?>">
                <?php foreach ( $wallet_list as $w ) {
                    $i = isset($w['icon']) ? $w['icon'] : '';                  
                    $d = isset($w['s_desc']) ? $w['s_desc'] : '';

                    $u = isset($w['url']['url']) ? $w['url']['url'] : '';
                    $link = ' href="' .  esc_url($u) . '" ';
                    if ( isset($w['url']['is_external']) && $w['url']['is_external'] ) {
                      $link .= ' target="_blank" ';
                    }
                    ?>
                    
                    <div class="tx-wallet-item tmc-grid-item">
                      <a class="tx-wallet-icon" <?php echo $link;?>>
                        <?php Icons_Manager::render_icon( $i, [ 'aria-hidden' => 'true' ], 'i' );?>
                      </a>
                      <div class="tx-wallet-desc">
                        <?php echo wp_kses_post($d);?>
                      </div>
                    </div>                    
                <?php }?>
              </div>
              <?php if(!empty($settings['html'])):?>
                <?php echo $settings['html'];?>
              <?php endif;?>
          </div>      

      </div>
      <?php
    }
}