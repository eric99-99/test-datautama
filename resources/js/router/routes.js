const Settings = () => import('../Views/Settings.vue');
const Profile = () => import('../Views/Profile.vue');
const Password = () => import('../Views/Password.vue');
const Login = () => import('../Views/Login.vue');
const ForgotPassword = () => import('../Views/ForgotPassword.vue');
const ResetPassword = () => import('../Views/ResetPassword.vue');
const VerifyEmail = () => import('../Views/VerifyEmail.vue');
const Register = () => import('../Views/Register.vue');
const Home = () => import('../Views/Home.vue');
const Welcome = () => import('../Views/Welcome.vue');
const Products = () => import('../Views/product/Mainmenu.vue');
const ProductIndex = () => import('../Views/product/Index.vue');
const ProductCreate = () => import('../Views/product/Add.vue');
const ProductUpdate = () => import('../Views/product/Edit.vue');
const Transaction = () => import('../Views/transaction/Menu.vue');
const TransactionIndex = () => import('../Views/transaction/Index.vue');

export default [{
        path: '/',
        component: Welcome,
        name: 'welcome',

    },
    {
        path: '/home',
        component: Home,
        name: 'home',
        meta: {
            guard: 'auth'
        }
    },
    {
        path: '/login',
        component: Login,
        name: 'login',
        meta : {
            guard : 'guest'
        }
    },
    {
        path: '/forgot-password',
        component: ForgotPassword,
        name: 'forgot-password',
        meta : {
            guard : 'guest'
        }
    },
    {
        path: '/reset-password/:token',
        props: route => ({
            token: route.params.token,
            email: route.query.email
        }),
        component: ResetPassword,
        name: 'reset-password',
        meta : {
            guard : 'guest'
        }
    },
    {
        path: '/register',
        component: Register,
        name: 'register',
        meta : {
            guard : 'guest'
        }
    },
    {
        path: '/verify-email/:id/:hash',
        props: route => ({
            id: route.params.id,
            hash: route.params.hash
        }),
        component: VerifyEmail,
        name: 'verify-email',

    },
    {
        path: '/settings',
        component: Settings,
        redirect: {
            name: 'profile'
        },
        name: 'settings',
        meta: {
            guard: 'auth'
        },
        children: [{
                path: 'profile',
                component: Profile,
                name: 'profile',
                meta: {
                    guard: 'auth'
                },

            },
            {
                path: 'password',
                component: Password,
                name: 'password',
                meta: {
                    guard: 'auth'
                },

            },

        ]
    },
    {
        path: '/transaction',
        component: Transaction,
        redirect: {
            name: 'transaction.index'
        },
        name: 'transaction',
        meta: {
            guard: 'auth'
        },
        children: [{
                path: 'transaction.index',
                component: TransactionIndex,
                name: 'transaction.index',
                meta: {
                    guard: 'auth'
                },

            },
        ]
    },
    {
        path: '/product',
        component: Products,
        redirect: {
            name: 'index'
        },
        name: 'products',
        meta: {
            guard: 'auth'
        },
        children: [{
                path: 'index',
                component: ProductIndex,
                name: 'index',
                meta: {
                    guard: 'auth'
                },

            },
            {
                path: 'create',
                component: ProductCreate,
                name: 'create',
                meta: {
                    guard: 'auth'
                },

            },
            {
                path: 'update',
                component: ProductUpdate,
                name: 'update',
                meta: {
                    guard: 'auth'
                },

            },

        ]
    },
    {
        path: '/:pathMatch(.*)*',
        redirect: '/home',

    }
];
