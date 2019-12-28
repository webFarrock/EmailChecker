# Проверка email на валидность

Внимание! Этот пакет был создан в учебных целях. Не используйте его в своих проектах

## Как пользоваться

### Проверка email на валидность 


```
    $email = $_POST['email'];

    // создаем класс с базовой проверкой на валидность
    $obCheck = new \WebFarrock\EmailChecker\Check();

    // добавляем правило на проверку mx записи
    $obCheck->addChecker(new \WebFarrock\EmailChecker\RuleMxRecord());
    $result = $obCheck->check($email);

    if ($result->isSuccess()) {
       // проверка пройдена успешно
    } else {     
        // проверка не пройдена
        // получаем массив с подробным описанием 
        $result->getErrorMessages();
    } 
```

### Добавления своих правил


```
    // Создаем класс реализующий интерфейс
    class RuleMyRule implements \WebFarrock\EmailChecker\RuleInterface
    {
        public function check(string $email)
        {
            // Тут прописываем свою проверку $email на валидность
            // Если пройдено успешно true
            // Иначе выкидываем исключение

            if(true === $result){
                return true;
            }else{
                throw new \WebFarrock\EmailChecker\InvalidEmailException('Email не прошел мою проверку ');
            }
        }
    }
```