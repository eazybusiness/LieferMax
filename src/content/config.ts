import { defineCollection, z } from 'astro:content';

const pagesCollection = defineCollection({
  type: 'content',
  schema: z.object({
    title: z.string(),
    description: z.string(),
    heroTitle: z.string(),
    heroSubtitle: z.string().optional(),
    heroBadge: z.string().optional(),
    heroStats: z.array(z.object({
      label: z.string(),
      value: z.string(),
    })).optional(),
    screenshots: z.array(z.object({
      image: z.string(),
      alt: z.string(),
    })).optional(),
    products: z.array(z.object({
      title: z.string(),
      icon: z.string(),
      description: z.string(),
      link: z.string(),
    })).optional(),
    copaIntegration: z.object({
      title: z.string(),
      description: z.string(),
      features: z.array(z.object({
        title: z.string(),
        description: z.string(),
      })),
    }).optional(),
  }),
});

const productsCollection = defineCollection({
  type: 'content',
  schema: z.object({
    title: z.string(),
    excerpt: z.string(),
    badge: z.string(),
    badgeColor: z.enum(['red', 'green', 'blue', 'purple', 'orange']),
    logo: z.string().optional(),
    image: z.string(),
    features: z.array(z.object({
      text: z.string(),
    })),
    screenshots: z.array(z.object({
      image: z.string(),
      alt: z.string(),
    })).optional(),
  }),
});

const settingsCollection = defineCollection({
  type: 'data',
  schema: z.object({
    title: z.string(),
    description: z.string(),
    phone: z.string(),
    email: z.string(),
    address: z.string(),
  }),
});

export const collections = {
  'pages': pagesCollection,
  'products': productsCollection,
  'settings': settingsCollection,
};
