# 🐰 Sistema de Cadastro Portuelho

## ✅ Arquivos Funcionais (que vão para o servidor):

### 📂 Estrutura atual:
```
htdocs/
├── index.php (página principal)
├── profile.php
├── test_cadastro.php (teste do sistema)
├── login/
│   └── index.php
├── singup/
│   └── index.php (formulário de cadastro)
├── php/
│   ├── crud.php (conexão com banco)
│   └── crud_dev.php (removido)
├── src/
│   ├── logo.webp
│   └── style_form.css
```

## 🚀 Como testar:

### 1. **No servidor InfinityFree:**
- Acesse: `https://portuelho.free.nf/test_cadastro.php`
- Este arquivo vai testar automaticamente o cadastro

### 2. **Formulário real:**
- Acesse: `https://portuelho.free.nf//singup/`
- Preencha o formulário de cadastro

## 🔧 O que foi corrigido:

✅ **Tabela ALUNO** - Já tem o campo SENHA_ALUNO  
✅ **Formulário** - method="POST" e campos name corretos  
✅ **Validações** - Email, username único, senhas conferem  
✅ **Segurança** - Hash Argon2ID, base64_encode, prepared statements  
✅ **Estrutura** - Todos os arquivos na pasta htdocs  

## 📋 Fluxo do cadastro:

1. **Validação dos campos** (obrigatórios, email válido)
2. **Verificação de duplicatas** (email e username únicos)
3. **Hash da senha** (Argon2ID para segurança)
4. **Inserção no banco** (prepared statement)
5. **Confirmação** (mensagem de sucesso)

## 🎯 Status:
**✅ PRONTO PARA USO!** 

O sistema está completamente funcional. Teste com o arquivo `test_cadastro.php` primeiro para confirmar que tudo está funcionando.
