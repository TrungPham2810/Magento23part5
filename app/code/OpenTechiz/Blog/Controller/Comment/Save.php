<?php
namespace OpenTechiz\Blog\Controller\Comment;
use \Magento\Framework\App\Action\Action;

class Save extends Action
{
    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $_commentFactory;

    protected $_resultJsonFactory;

    protected $_inlineTranslation;

    protected $_transportBuilder;

    protected $_scopeConfig;

    protected $_sendEmail;

    protected $_customerSession;

    protected $resultRedirect;

    function __construct(
        \OpenTechiz\Blog\Model\CommentFactory $commentFactory,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation,
        \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Customer\Model\Session $customerSession,
        \OpenTechiz\Blog\Helper\SendEmail $sendEmail,
        \Magento\Framework\Controller\ResultFactory $result,
        \Magento\Framework\App\Action\Context $context
    )
    {
        $this->_commentFactory = $commentFactory;
        $this->_resultFactory = $context->getResultFactory();
        $this->_resultJsonFactory = $resultJsonFactory;
        $this->_inlineTranslation = $inlineTranslation;
        $this->_transportBuilder = $transportBuilder;
        $this->_scopeConfig = $scopeConfig;
        $this->_sendEmail = $sendEmail;
        $this->_customerSession = $customerSession;
        $this->resultRedirect = $result;
        parent::__construct($context);
    }

    public function execute()
    {
        $error = false;
        $message = '';
        $postData = (array) $this->getRequest()->getPostValue();
//        var_dump($postData);
        $jsonResultResponse = $this->_resultJsonFactory->create();
        if(!$postData)
        {
            $error = true;
            $message = "Your submission is not valid. Please try again!";

        }
        $this->_inlineTranslation->suspend();
        $postObject = new \Magento\Framework\DataObject();
        $postObject->setData($postData);

//        $jsonResultResponse = $this->_resultJsonFactory->create();
        // declare user
//        $customer = null;
        if(!$this->_customerSession->isLoggedIn())
        {
            $error = true;
            $message = "You need log in to comment";

        }
//
//

        if(!$error)
        {
            // save data to database
            $model = $this->_commentFactory->create();
            $model->addData([
                "comment" => $postData['comment'],
                "blog_id" => $postData['blog_id'],

                "customer_id" => $postData['customer_id']
            ]);
            $model->save();
//            echo 'success';
            $jsonResultResponse->setData([
                'result' => 'success',
                'message' => 'Thank you for your submission. Our Admins will review and approve shortly'
            ]);
            $userInfo = $this->_customerSession->getCustomerData();
            $name = $userInfo->getFirstName()." ".$userInfo->getLastName();
            $email = $userInfo->getEmail();
            echo $name;
            echo $email;
////            // send email to user
            $this->_sendEmail->approvalEmail($email, $name);

//            echo 'success';
        } else {
            $jsonResultResponse->setData([
                'result' => 'error',
                'message' => $message
            ]);
        }

        return $jsonResultResponse;
    }

//    public function execute()
//    {
//        $error = false;
//        $message = '';
//        $postData = (array) $this->getRequest()->getPostValue();
////        var_dump($postData);
//////        $resultRedirect = $this->resultRedirect->create(ResultFactory::TYPE_REDIRECT);
//////        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
////        $model = $this->_commentFactory->create();
////        $model->addData([
////            "comment" => $postData['comment'],
////            "blog_id" => $postData['blog_id'],
////            "status_id" => 2,
////            "customer_id" => $postData['customer_id']
////        ]);
////        $model->save();
////        echo 'success';
////        $saveData = $model->save();
//
////        if($saveData){
////            $this->messageManager->addSuccess( __('Insert Record Successfully !') );
////        }
////        return $resultRedirect;
//
//
//        if(!$postData)
//        {
//            $error = true;
//            $message = "Your submission is not valid. Please try again!";
//        }
//        $this->_inlineTranslation->suspend();
//        $postObject = new \Magento\Framework\DataObject();
//        $postObject->setData($postData);
//
//        // declare user
//        $customer = null;
//        if(!$this->_customerSession->isLoggedIn())
//        {
//            $error = true;
//            $message = "You need log in to comment";
//        }
////
////
//        $jsonResultResponse = $this->_resultJsonFactory->create();
//        if(!$error)
//        {
//            // save data to database
//            $model = $this->_commentFactory->create();
//            $model->addData([
//                "comment" => $postData['comment'],
//                "blog_id" => $postData['blog_id'],
//
//                "customer_id" => $postData['customer_id']
//            ]);
//            $model->save();
////            echo 'success';
//
//            // save data to database
////            $customer_id = $postData['customer_id'];
////            $comment = $postData['comment'];
////            $blog_id = $postData['blog_id'];
////
////            $comment = $this->_commentFactory->create();
////            $comment->setCustomerId($customer_id);
////            $comment->setComment($comment);
////            $comment->setBlogId($blog_id);
////            $comment->save();
//            $jsonResultResponse->setData([
////                'result' => 'success',
//                'message' => 'Thank you for your submission. Our Admins will review and approve shortly'
//            ]);
//////
//////            // send email to user
////////            $this->_sendEmail->approvalEmail($email, $author);
//        } else {
//            $jsonResultResponse->setData([
//                'result' => 'error',
//                'message' => $message
//            ]);
//        }
//
//        return $jsonResultResponse;
//    }


}