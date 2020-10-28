<?php
/**
* Classe responsável por verificar qual o idioma está sendo utilizado e carregar
* os respectivos arquivos no diretório 'application/language'
*
*/
class LanguageLoader
{
  /**
   * Método que faz o carregamento dos arquivos de idiomas conforme
   * parâmetro obtido na URL
   *
   */
  function initialize() {
    //cria uma instância local para acessar métodos do CodeIgniter
    //(corresponde ao $this)
    $ci =& get_instance();
    //carrega o helper 'language', que libera o uso dos recursos de multi-idioma
    $ci->load->helper('language');
    //verifica qual é o idioma a ser carregado a partir do parâmetro do primeiro
    //nó da URL
    switch ($ci->uri->segment(1)) {
      case 'en':
      $idioma = 'english';
      break;
      case 'pt_br':
      $idioma = 'portuguese-brazilian';
      break;
      default:
      $idioma = 'english';
      break;
    }
    //carrega todos os arquivos de idioma, dessa forma você poderá utilizar as
    //mensagens das bibliotecas nativas normalmente
    $ci->lang->load(array(
      'date',
      'db',
      'email',
      'form_validation',
      'ftp',
      'imglib',
      'migration',
      'number',
      'pagination',
      'profiler',
      'unit_test',
      'upload',
      'btn',
    ),$idioma);
    
    //define o idioma a ser utilizado, diretamente nas configurações globais da aplicação.
    $ci->config->set_item('language', $idioma);
  }
}