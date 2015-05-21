<?php

namespace Alex\Sistema\Interfaces;

interface ProdutoInterface
{

    function getId();

    function getNome();

    function getDescricao();

    function getValor();

    function setId($id);

    function setNome($nome);

    function setDescricao($descricao);

    function setValor($valor);

}
